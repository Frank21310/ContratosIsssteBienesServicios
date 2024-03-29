<?php

namespace App\Http\Controllers\Contratante;

use App\Exports\ContratosExport;
use App\Http\Controllers\Controller;
use App\Models\Contrato;
use App\Models\Domicilio;
use App\Models\Empleado;
use App\Models\Persona;
use App\Models\PersonaFisica;
use App\Models\PersonaMoral;
use App\Models\Proveedor;
use App\Models\Requisicion;
use App\Models\TipoC;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Database\Eloquent\Relations\HasOne;



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
        $limit = (isset($request->limit)) ? $request->limit : 4;

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
        $tipopersona = Persona::all();
        $tipocaracters = TipoC::all();
        $personas = Persona::all();
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
        $proveedores = Proveedor::all();
        return view(
            'Contratante.Contratos.create',
            compact(
                'requisicion',
                'AdminContratos',
                'empleadosubdelegado',
                'empleadomateriales',
                'empleadofinanzas',
                'tiposcontratos',
                'proveedores',
                'personas',
                'tipopersona',
                'tipocaracters'
            )
        );
    }
    public function createUpdateproveedor(Request $request, $proveedor)
    {
        $proveedor->persona_id = $request->persona_id;
        $proveedor->nombre = $request->nombre;
        $proveedor->rfc = $request->rfc;
        $proveedor->nacionalidad = $request->nacionalidad;
        $domicilio = new Domicilio();
        $domicilio->calle = $request->calle;
        $domicilio->municipio = $request->municipio;
        $domicilio->codigo_postal = $request->codigo_postal;
        $domicilio->estado = $request->estado;
        $domicilio->pais = $request->pais;
        $domicilio->save();
        $proveedor->domicilio_id = $domicilio->id_domicilio;
        $proveedor->documento_expedicion = $request->documento_expedicion;
        $proveedor->institucion_expedida = $request->institucion_expedida;
        $proveedor->instrumento_publico = $request->instrumento_publico;
        $proveedor->registro_publico = $request->registro_publico;
        $proveedor->folio_registro = $request->folio_registro;
        $proveedor->fecha_registro = $request->fecha_registro;
        $proveedor->representante = $request->representante;
        $proveedor->caracter_id = $request->caracter_id;
        $proveedor->instrumento_notarial_representante = $request->instrumento_notarial_representante;
        $proveedor->save();
        return  $proveedor;
    }
    public function proveedor(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor = $this->createUpdateproveedor($request, $proveedor);
        return redirect()->back()->with('success', 'Proveedor agregado correctamente');
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
            'proveedor' => $request->proveedor,
        ]);
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
        //$partidas = Partida::all();
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

        // Cargar la vista del contrato con la información obtenida
        $pdf = Pdf::loadView('Contratante.Contratos.formularios.form', compact('requisicion', 'image', 'contrato', 'empleadosubdelegado', 'empleadomateriales', 'empleadofinanzas'));
        $pdf->render();

        // Devolver el PDF generado
        return $pdf->setPaper('a4', 'portrait')->stream('contrato_' . $id . '.pdf');

    }
    public function wordContrato(Request $request,$id)
    {
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
        // Crear un nuevo objeto PHPWord
        $phpWord = new PhpWord();
        // Agregar una sección al documento
        $section = $phpWord->addSection();
        // Crear el encabezado
        $header = $section->addHeader();

        // Crear una tabla en el encabezado con dos columnas
        $table = $header->addTable();
        $table->addRow();

        // Columna 1: Imagen
        $cell1 = $table->addCell(5500);
        $imagePath = 'assets/img/LogoNew2.png';
        $imageStyle = array('width' => 225);
        $cell1->addImage($imagePath, $imageStyle);

        // Columna 2: Contenido del formulario
        $cell2 = $table->addCell(4500);
        $contenidoEncabezado = view('Contratante.Contratos.formularios.word.Encabezado', compact('requisicion', 'contrato'))->render();
        \PhpOffice\PhpWord\Shared\Html::addHtml($cell2, $contenidoEncabezado, false, false);

        // Agregar pie de página
        $footer = $section->addFooter();
        $footer->addPreserveText('Página {PAGE} de {NUMPAGES}', null, array('alignment' => 'center'));

        if ($contrato->tipo_contrato_id == 1) {
            // Agregar contenido al documento para contratos de bienes
            $htmlView = view('Contratante.Contratos.formularios.word.Cuerpobienes', compact('requisicion', 'logo', 'contrato', 'empleadosubdelegado', 'empleadomateriales', 'empleadofinanzas'))->render();
            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $htmlView, false, true);
        } elseif ($contrato->tipo_contrato_id == 2) {
            // Agregar contenido al documento para contratos de servicios
            $htmlView = view('Contratante.Contratos.formularios.word.Cuerpo', compact('requisicion', 'logo', 'contrato', 'empleadosubdelegado', 'empleadomateriales', 'empleadofinanzas'))->render();
            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $htmlView, false, true);
        } else {
                $section->addText('No se ha asignado un contenido para este tipo de contrato.', null, array('alignment' => 'center'));

        }

        // Subir los archivos a la carpeta local con el nuevo nombre
        $requisitionFolder = 'requisicion/' . $requisicion->no_requisicion;
        Storage::disk('local')->makeDirectory($requisitionFolder);
        
        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $fileName = $archivo->getClientOriginalName();
                $path = $archivo->storeAs($requisitionFolder, $fileName, 'local');
            }
        }
        
        // Guardar el documento en la misma carpeta
        $nombreArchivo = 'contrato_' . $id . '.docx'; // Nombre del archivo Word
        $rutaArchivo = storage_path('app/' . $requisitionFolder . '/' . $nombreArchivo); // Ruta completa
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        
        // Utilizar FileStream para guardar el archivo en una ubicación específica
        $streamWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $streamWriter->save($rutaArchivo);
        
        // Devolver el documento Word generado para descargar
        return response()->download($rutaArchivo, $nombreArchivo);
        // Devolver el documento Word generado para descargar
        return response()->download(storage_path($rutaArchivo), $nombreArchivo);

    }
    
    public function exportExcel()
    {
        return Excel::download(new ContratosExport, 'contratos.xlsx');
    }
        public function obtenerInformacionProveedor($proveedor)
{
    $proveedor = Proveedor::with('Personas', 'Domicilios', 'Caracter')->find($proveedor);
    

    return response()->json($proveedor);
}
}
