<?php

namespace App\Http\Controllers\Contratante;

use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Empleado;
use App\Models\Partida;
use App\Models\PersonaFisica;
use App\Models\PersonaMoral;
use App\Models\Requisicion;
use App\Models\TipoC;
use App\Models\TipoCaracter;
use App\Models\TipoContrato;
use App\Models\TipoPersona;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;


class ContratosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solocontratante', ['only' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contratos = Contrato::select('*')->orderBy('id_contrato', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 3;

        if (isset($request->search)) {
            $contratos = $contratos->where('id_contrato', 'like', '%' . $request->search . '%')
                ->orWhere('empleado_num', 'like', '%' . $request->search . '%')
                ->orWhere('descripcion_contrato', 'like', '%' . $request->search . '%');
                
        }
        $contratos = $contratos->paginate($limit)->appends($request->all());
        return view('Contratante.Contratos.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $requisicion_id)
    {
        $requisicion = Requisicion::with('detalles')->where('id_requisicion', $requisicion_id)->firstOrFail();
        $AdminContratos = Empleado::all();
        $empleadosubdelegado = Empleado::where('cargo_id', '3')
            ->where('dependencia_id', '1')
            ->first();
        $empleadomateriales = Empleado::where('cargo_id', '7')
            ->where('dependencia_id', '1')
            ->first();
        $empleadofinanzas = Empleado::where('cargo_id', '5')
            ->where('dependencia_id', '1')
            ->first();
        $tiposcontratos = TipoC::all();
        $tipopersona = TipoPersona::all();
        $tipocaracters = TipoCaracter::all();

        return view(
            'Contratante.Contratos.create',
            compact(
                'requisicion',
                'AdminContratos',
                'empleadosubdelegado',
                'empleadomateriales',
                'empleadofinanzas',
                'tiposcontratos',
                'tipopersona',
                'tipocaracters'
            )
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contrato = Contrato::create([

            'requisicion_id' => $request->requisicion_id,
            'tipo_contrato_id' => $request->tipo_contrato_id,
            'descripcion_contrato' => $request->descripcion_contrato,
            'vigencia_contrato' => $request->vigencia_contrato,
            'empleado_num' => $request->empleado_num,
            'oficio_suficiencia' => $request->oficio_suficiencia,
            'fecha_oficio_suficiencia' => $request->fecha_oficio_suficiencia,
            'oficio_plurianualidad' => $request->oficio_plurianualidad,
            'reduccion' => $request->reduccion,
            'autorizacion_previa' => $request->autorizacion_previa,


        ]);

        if ($request->tipo_persona_id == 1) {
            PersonaFisica::create([
                'contrato_id' => $contrato->id_contrato,
                'tipo_persona_id' => $request->tipo_persona_id,
                'rfc' => $request->rfc,
                'nombre_proveedor' => $request->nombre_proveedor,
                'nacionalidad' => $request->nacionalidad,
                'domicilio' => $request->domicilio,
                'documento_expedicion' => $request->documento_expedicion,
                'instutucion_expedida' => $request->instutucion_expedida,
            ]);
        } elseif ($request->tipo_persona_id == 2) {
            PersonaMoral::create([
                'contrato_id' => $contrato->id_contrato, // Guarda el ID del contrato
                'tipo_persona_id' => $request->tipo_persona_id,
                'rfc' => $request->rfc,
                'nombre_proveedor' => $request->nombre_proveedor,
                'nacionalidad' => $request->nacionalidad,
                'domicilio' => $request->domicilio,
                'instrumento_publico' => $request->instrumento_publico,
                'registro_publico' => $request->registro_publico,
                'fiolio_registro' => $request->fiolio_registro,
                'fecha_registro' => $request->fecha_registro,
                'repesentante_nombre' => $request->repesentante_nombre,
                'tipo_caracter_id' => $request->tipo_caracter_id,
                'instrumento_notarial' => $request->instrumento_notarial,
                'instrumento_publico_representante' => $request->instrumento_notarial,
            ]);
        }
        // Obtener el ID de la requisición relacionada con este contrato
        $requisicion_id = $contrato->requisicion_id;

        // Buscar la requisición relacionada con el ID obtenido
        $requisicion = Requisicion::where('id_requisicion', $requisicion_id)->firstOrFail();
        $requisicion->estatus = '5';
        $requisicion->save();

        return redirect()
            ->route('Contratos.index');
    }
    public function imprimirContrato($id)
    {

        $image = '/assets/img/LogoNew.png';
        $partidas = Partida::all();
        $empleadosubdelegado = Empleado::where('cargo_id', '3')
            ->where('dependencia_id', '1')
            ->first();
        $empleadomateriales = Empleado::where('cargo_id', '7')
            ->where('dependencia_id', '1')
            ->first();
        $empleadofinanzas = Empleado::where('cargo_id', '5')
            ->where('dependencia_id', '1')
            ->first();

        // Obtener el contrato específico
        $contrato = Contrato::where('id_contrato', $id)->firstOrFail();

        // Obtener la requisición asociada a ese contrato
        $requisicion = Requisicion::where('id_requisicion', $contrato->requisicion_id)->with('detalles')->firstOrFail();

        // Obtener la persona física asociada al contrato (si existe)
        $personafisica = PersonaFisica::where('contrato_id', $id)->first();

        // Obtener la persona moral asociada al contrato (si existe)
        $personamoral = PersonaMoral::where('contrato_id', $id)->first();

        // Verificar si hay una sola persona asociada al contrato
        if ($personamoral !== null && $personafisica !== null) {
            // Puedes agregar lógica para manejar este caso específico
        } else {
            // Si solo hay una persona (ya sea física o moral), asignarla a una variable
            $persona = $personamoral !== null ? $personamoral : $personafisica;

            // Cargar la vista del contrato con la información obtenida
            $pdf = Pdf::loadView('Contratante.contratos.formularios.form', compact('requisicion', 'image', 'contrato', 'persona', 'empleadosubdelegado', 'empleadomateriales', 'empleadofinanzas'));
            $pdf->render();

            // Devolver el PDF generado
            return $pdf->setPaper('a4', 'portrait')->stream('contrato_' . $id . '.pdf');
        }

        // Manejar el caso donde no se encuentra ninguna persona asociada al contrato
        // Puedes agregar lógica adicional según tus requerimientos
    }
    public function wordContrato($id)
    {
        $partidas = Partida::all();
        $empleadosubdelegado = Empleado::where('cargo_id', '3')
            ->where('dependencia_id', '1')
            ->first();
        $empleadomateriales = Empleado::where('cargo_id', '7')
            ->where('dependencia_id', '1')
            ->first();
        $empleadofinanzas = Empleado::where('cargo_id', '5')
            ->where('dependencia_id', '1')
            ->first();
        $logo = asset('assets/img/LogoNew2.png');


        // Obtener el contrato específico
        $contrato = Contrato::where('id_contrato', $id)->firstOrFail();

        // Obtener la requisición asociada a ese contrato
        $requisicion = Requisicion::where('id_requisicion', $contrato->requisicion_id)->with('detalles')->firstOrFail();

        // Obtener la persona física asociada al contrato (si existe)
        $personafisica = PersonaFisica::where('contrato_id', $id)->first();

        // Obtener la persona moral asociada al contrato (si existe)
        $personamoral = PersonaMoral::where('contrato_id', $id)->first();

        // Verificar si hay una sola persona asociada al contrato
        if ($personamoral !== null && $personafisica !== null) {
            // Puedes agregar lógica para manejar este caso específico
        } else {
            // Si solo hay una persona (ya sea física o moral), asignarla a una variable
            $persona = $personamoral !== null ? $personamoral : $personafisica;

            // Crear un nuevo objeto PHPWord
            $phpWord = new PhpWord();

            // Agregar una sección al documento
            $section = $phpWord->addSection();

            // Crear el encabezado
            $encabezado = $section->addHeader();

            // Obtener el contenido del encabezado desde la vista
            $encabezado = view('Contratante.contratos.formularios.word.Encabezado', compact('requisicion', 'contrato', 'persona'))->render();
            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $encabezado, false, false);
            // Agregar pie de página

            $footer = $section->addFooter();
            $footer->addPreserveText('Página {PAGE} de {NUMPAGES}', null, array('alignment' => 'right'));

            // Agregar contenido al documento
            $htmlView = view('Contratante.contratos.formularios.word.Cuerpo', compact('requisicion', 'logo', 'contrato', 'persona', 'empleadosubdelegado', 'empleadomateriales', 'empleadofinanzas'))->render();
            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $htmlView, false, true);

            // Alinear el contenido a justificado
            // $section->addTextBreak();
            $section->addText('Contenido justificado', null, array('alignment' => 'both'));

            // Guardar el documento en storage (o en la ubicación que desees)
            $nombreArchivo = 'contrato_' . $id . '.docx'; // Nombre del archivo Word
            $rutaArchivo = storage_path($nombreArchivo);

            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($rutaArchivo);


            // Devolver el documento Word generado para descargar
            return response()->download($rutaArchivo, $nombreArchivo);
        }

        // Manejar el caso donde no se encuentra ninguna persona asociada al contrato
        // Puedes agregar lógica adicional según tus requerimientos
    }
}
