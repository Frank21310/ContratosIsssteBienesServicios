@csrf

<!--TITULO "DATOS DEL CONTRATO"-->
<div class="row justify-content-center align-items-center">
    <div class="col-3">
        <h4>Datos del contrato</h4>
    </div>
</div>
<div class="row">
    <input type="hidden" name="requisicion_id" value="{{ $requisicion->id_requisicion }}">
    <!--Tipo de contrato-->
    <div class="col-3">
        <label for="tipo_contrato">Tipo de contrato</label>
        <select class="form-control custom-select" name="tipo_contrato_id" required>
            <option>Selecciona ... </option>
            @foreach ($tiposcontratos as $tiposcontrato)
                <option value="{{ $tiposcontrato->id_tipo_contrato}}">
                    {{ $tiposcontrato->nombre_tipo_contrato }}
                </option>
            @endforeach
        </select>
    </div>
    <!--descripcion del contrato-->
    <div class="col">
        <label for="">Descripcion del servicio</label>
        <input type="text" name="descripcion_contrato" id="descripcion_contrato" class="form-control custom-input"
            placeholder="Descricion del servicio....." required>
    </div>
</div>
<div class="row">
    <!--vigencia del contrato-->
    <div class="col">
        <label>Vigencia del contrato</label>
        <input type="text" name="vigencia_contrato" id="vigencia_contrato" class="form-control custom-input"
            placeholder="Fecha de la vigencia" required>
    </div>
    <!--administrador del contrato-->
    <div class="col">
        <label>Administrador de contratos</label>
        <select name="empleado_num" id="select-admincontrato" class="form-select custom-select" required>
            @foreach ($AdminContratos as $AdminContrato)
                <option value="{{ $AdminContrato->num_empleado }}">{{ $AdminContrato->nombre }}
                    {{ $AdminContrato->apellido_paterno }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <!--oficio de suficiencia del contrato-->
    <div class="col">
        <label>Oficio de suficiencia Presupuestal</label>
        <input type="text" name="oficio_suficiencia" id="oficio_suficiencia" class="form-control custom-input"
            placeholder="Oficio de suficiencia Presupuestal" required>
    </div>
    <!--fecha oficio de suficiencia del contrato-->
    <div class="col">
        <label>Fecha del oficio de suficiencia presupuestal</label>
        <input type="text" name="fecha_oficio_suficiencia" id="select-fecha_oficio_suficiencia"
            class="form-control custom-input" placeholder="Oficio de suficiencia Presupuestal" required>
    </div>
    <!--oficio de plurianualidad del contrato-->
    @if ($requisicion->pluralidad == 1)
        <div class="col">
            <label>Oficio de plurianualidad</label>
            <input type="text" name="oficio_plurianualidad" id="oficio_plurianualidad"
                class="form-control custom-input" placeholder="Oficio de plurianualidad" required>
        </div>
    @else
    @endif
</div>
<div class="row">
    @php
        $garantia_activada = null;
        $porcentaje_garantia = null;
    @endphp
    @if ($requisicion->garantia1_id == 2)
        @php
            $garantia_activada = 'garantia_1';
            $porcentaje_garantia = $requisicion->porcentaje_1;
        @endphp
    @elseif ($requisicion->garantia_2_id == 2)
        @php
            $garantia_activada = 'garantia_2';
            $porcentaje_garantia = $requisicion->porcentaje_2;
        @endphp
    @elseif ($requisicion->garantia_3_id == 2)
        @php
            $garantia_activada = 'garantia_3';
            $porcentaje_garantia = $requisicion->porcentaje_3;
        @endphp
    @endif
    @if ($garantia_activada)
        <div class="col">
            <label>Reduccion del monto de la garantia ya que cuenta con
                <strong>{{ $porcentaje_garantia }}</strong></label>
            <input type="text" name="reduccion" id="reduccion" class="form-control custom-input"
                placeholder="Garantia de reduccion" >
        </div>
    @endif
    <div class="col">
        <label>La contratacion es previa a la autorizacion de su presupuesto</label>
        <div class="form-check">
            <input class="form-check-input custom-input" type="radio" name="autorizacion_previa" id="autorizacion_previa" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Si es previa
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input custom-input" type="radio" name="autorizacion_previa" id="autorizacion_previa" value="0"
                checked>
            <label class="form-check-label" for="flexRadioDefault2">
                No es previa
            </label>
        </div>
    </div>
</div>
@if ($requisicion->tipo_id == 0)
    <h5>TRATÁNDOSE DE LICITACIONES PÚBLICAS O INVITACIÓN A CUANDO MENOS TRES PERSONAS</h5>
    <div class="row">
        <div class="col">
            <label for="">NUMERAR Y DESCRIBIR LOS ANEXOS</label>
            <input type="text" name="ANEXOS" id="ANEXOS" class="form-control custom-input"
                placeholder="NUMERAR Y DESCRIBIR LOS ANEXOS" required>
        </div>
    </div>
@else
@endif
<br>
<div class="row justify-content-center align-items-center">
    <div class="col-3">
        <h4>Datos del proveedor</h4>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <label>Tipo de persona</label>
        <select name="tipo_persona_id" id="tipo_proveedor" class="form-select custom-select" required
        onchange="mostrarCampos()">
            <option value="">Selecciona el tipo..</option>
            @foreach ($tipopersona as $tipoperson)
                <option value="{{ $tipoperson->id_tipo_persona}}">
                    {{ $tipoperson->nombre_tipo_persona }}
                </option>
            @endforeach
        </select>

    </div>
    <div class="col-6">
        <label for="">RFC del proveedor</label>
        <input type="text" name="rfc" id="rfc_proveedor" class="form-control custom-input"
            placeholder="RFC" required>
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Nombre del proveedor</label>
        <input type="text" name="nombre_proveedor" class="form-control custom-input"
            placeholder="Nombre de la persona moral" req>
    </div>
</div>
<div class="row">
    <div class="col-5">
        <label for="">Nacionalidad del proveedor</label>
        <select name="nacionalidad" id="nacionalidad_proveedor" class="form-select custom-select" required>
            <option value="">Selecciona el tipo..</option>
            <option value="Mexicana">Mexicana</option>
            <option value="Extragnera">Extragnera</option>
            <option value="Otra">Otra</option>
        </select>
    </div>

    <div class="col-7">
        <label for="">Domicilio proveedor</label>
        <input type="text" name="domicilio" id="domicilio proveedor" class="form-control custom-input"
            placeholder="domicilio_proveedor" required>
    </div>
</div>

<!--Si es persona fisica-->
<div class="row" id="campos_persona_fisica" style="display: none;">
    <!-- Campos para Persona Fisica -->
    <div class="col">
        <label>Documento de acreditacion:</label>
        <input type="text" name="documento_expedicion" id="documento_acreditacion_proveedor"
            class="form-control custom-input" placeholder="Documento de acreditacion" >
    </div>
    <div class="col">
        <label>Expedida por:</label>
        <input type="text" name="instutucion_expedida" id="acreditacion_proveedor"
            class="form-control custom-input" placeholder="Institucion que acredita" >
    </div>
</div>
<!--Si es persona moral-->
<div class="row" id="campos_persona_moral" style="display: none;">
    <!-- Campos para Persona Moral -->
    <div class="col">
        <label for="">Instrumento publico que da origen</label>
        <input type="text" name="instrumento_publico" id="instrumento_proveedor_moral"
            class="form-control custom-input" placeholder="Instrumento publico que da origen" >
    </div>
    <div class="col">
        <label for="">Registro publico</label>
        <input type="text" name="registro_publico" id="nombre_registro_publico"
            class="form-control custom-input" placeholder="Registro publico" >
    </div>
    <div class="col">
        <label for="">Folio de registro publico</label>
        <input type="text" name="fiolio_registro" id="folio_registro_publico"
            class="form-control custom-input" placeholder="Folio" >
    </div>
    <div class="col">
        <label for="">Fecha de registro publico</label>
        <input type="text" name="fecha_registro" id="fecha_registro_publico"
            class="form-control custom-input" placeholder="Fecha" >
    </div>
</div>
<!--Si es persona moral-->
<div class="row" id="datos_proveedor_moral" style="display: none;">
    <div class="col" >
        <label>Nombre del representante</label>
        <input type="text" name="repesentante_nombre" id="nombre_proveedor_representante"
            class="form-control custom-input" placeholder="Nombre de la persona representante" >
    </div>
    <div class="col">
        <label for="">Caracter del representante del proveedor</label>
        <select name="tipo_caracter_id" id="tipo_proveedor" class="form-select custom-select" 
        onchange="mostrarCampos()">
            <option value="">Selecciona el tipo..</option>
            @foreach ($tipocaracters as $tipocaracter)
                <option value="{{ $tipocaracter->id_tipo_caracter}}">
                    {{ $tipocaracter->nombre_tipo_caracter }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <label for="">Instrumento notarial o poder otorgado</label>
        <input type="text" name="instrumento_notarial" id="instrumento_proveedor"
            class="form-control custom-input" placeholder="Instrumento publico que da orgien" >
    </div>
</div>
<!--Si es persona moral datos del representante-->
<div class="row" id="representante_moral" style="display: none;">
    <div class="col">
        <label for="">Instrumento publico que da orgien al repesentante </label>
        <input type="text" name="instrumento_proveedor" id="instrumento_proveedor"
            class="form-control custom-input" placeholder="Instrumento publico que da orgien" >
    </div>

</div>

<script>
    function mostrarCampos() {
        var tipoSeleccionado = document.getElementById("tipo_proveedor").value;

        if (tipoSeleccionado === "1") {

            document.getElementById("campos_persona_fisica").style.display = "block";
            document.getElementById("campos_persona_moral").style.display = "none";
            document.getElementById("datos_proveedor_moral").style.display = "none";
            document.getElementById("representante_moral").style.display = "none";

        } else if (tipoSeleccionado === "2") {
            document.getElementById("campos_persona_fisica").style.display = "none";
            document.getElementById("campos_persona_moral").style.display = "block";
            document.getElementById("datos_proveedor_moral").style.display = "block";
            document.getElementById("representante_moral").style.display = "block";
        } else {

            document.getElementById("campos_persona_fisica").style.display = "none";
            document.getElementById("campos_persona_moral").style.display = "none";
            document.getElementById("datos_proveedor_moral").style.display = "none";
            document.getElementById("representante_moral").style.display = "none";


        }
    }
</script>
