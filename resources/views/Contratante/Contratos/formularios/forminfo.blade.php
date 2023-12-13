@csrf
<div class="row justify-content-center align-items-center">
    <div class="col-3">
        <h4>Datos del contrato</h4>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <label for="tipo_contrato">Tipo de contrato</label>
        <select name="tipo_contrato" id="tipo_contrato" class="form-select custom-select" required>
            <option value="">Selecciona el tipo..</option>
            <option value="Bienes">Bienes</option>
            <option value="Servicio">Servicio</option>
        </select>
    </div>
    <div class="col">
        <label for="">Descripcion del servicio</label>
        <input type="text" name="descripcion_contrato" id="descripcion_contrato" class="form-control custom-input"
            placeholder="Descricion del servicio....." required>
    </div>
</div>
<div class="row">
    <div class="col">
        <label>Vigencia del contrato</label>
        <input type="text" name="vigencia_contrato" id="vigencia_contrato" class="form-control custom-input"
            placeholder="Fecha de la vigencia" required>
    </div>
    <div class="col">
        <label>Administrador de contratos</label>
        <select name="admincontrato" id="select-admincontrato" class="form-select custom-select" required>
            @foreach ($AdminContratos as $AdminContrato)
                <option value="{{ $AdminContrato->num_empleado }}">{{ $AdminContrato->nombre }}
                    {{ $AdminContrato->apellido_paterno }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">

    <div class="col">
        <label>Oficio de suficiencia Presupuestal</label>
        <input type="text" name="oficio_suficiencia" id="oficio_suficiencia" class="form-control custom-input"
            placeholder="Oficio de suficiencia Presupuestal" required>
    </div>
    <div class="col">
        <label>Fecha del oficio de suficiencia presupuestal</label>
        <input type="text" name="admincontrato" id="select-fecha_oficio_suficiencia"
            class="form-control custom-input" placeholder="Oficio de suficiencia Presupuestal" required>
    </div>
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
            <input type="text" name="garantia_reduccion" id="garantia_reduccion" class="form-control custom-input"
                placeholder="Garantia de reduccion" required>
        </div>
    @endif
    <div class="col">
        <label>La contratacion es previa a la autorizacion de su presupuesto</label>
        <div class="form-check">
            <input class="form-check-input custom-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Si es previa
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input custom-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
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
        <select name="tipo_proveedor" id="tipo_proveedor" class="form-select custom-select" required
            onchange="mostrarCampos()">
            <option value="">Selecciona el tipo..</option>
            <option value="Persona Fisica">Persona Fisica</option>
            <option value="Persona Moral">Persona Moral</option>
        </select>
    </div>
    <div class="col-6">
        <label for="">RFC del proveedor</label>
        <input type="text" name="rfc_proveedor" id="rfc_proveedor" class="form-control custom-input"
            placeholder="RFC" required>
    </div>
</div>
<div class="row">
    <div class="col" id="input_proveedor_fisica" style="display: none;">
        <label>Nombre del proveedor</label>
        <input type="text" name="nombre_proveedor" id="nombre_proveedor_fisica" class="form-control custom-input"
            placeholder="Nombre de la persona fisica" required>
    </div>
    <div class="col" id="input_proveedor_moral" style="display: none;">
        <label>Nombre del proveedor</label>
        <input type="text" name="nombre_proveedor" id="nombre_proveedor_moral" class="form-control custom-input"
            placeholder="Nombre de la persona moral" required>
    </div>
</div>
<div class="row">
    <div class="col-5">
        <label for="">Nacionalidad del proveedor</label>
        <select name="nacionalidad_proveedor" id="nacionalidad_proveedor" class="form-select custom-select" required>
            <option value="">Selecciona el tipo..</option>
            <option value="Mexicana">Mexicana</option>
            <option value="Extragnera">Extragnera</option>
            <option value="Otra">Otra</option>
        </select>
    </div>

    <div class="col-7">
        <label for="">Domicilio proveedor</label>
        <input type="text" name="domicilio_proveedor" id="domicilio_proveedor" class="form-control custom-input"
            placeholder="domicilio_proveedor" required>
    </div>
</div>

<!--Si es persona fisica-->
<div class="row" id="campos_persona_fisica" style="display: none;">
    <!-- Campos para Persona Fisica -->
    <div class="col">
        <label>Documento de acreditacion:</label>
        <input type="text" name="documento_acreditacion_proveedor" id="documento_acreditacion_proveedor"
            class="form-control custom-input" placeholder="Documento de acreditacion" required>
    </div>
    <div class="col">
        <label>Expedida por:</label>
        <input type="text" name="acreditacion_proveedor" id="acreditacion_proveedor"
            class="form-control custom-input" placeholder="Institucion que acredita" required>
    </div>
</div>
<!--Si es persona moral-->
<div class="row" id="campos_persona_moral" style="display: none;">
    <!-- Campos para Persona Moral -->
    <div class="col">
        <label for="">Instrumento publico que da origen</label>
        <input type="text" name="instrumento_proveedor_moral" id="instrumento_proveedor_moral"
            class="form-control custom-input" placeholder="Instrumento publico que da origen" required>
    </div>
    <div class="col">
        <label for="">Registro publico</label>
        <input type="text" name="nombre_registro_publico" id="nombre_registro_publico"
            class="form-control custom-input" placeholder="Registro publico" required>
    </div>
    <div class="col">
        <label for="">Folio de registro publico</label>
        <input type="text" name="folio_registro_publico" id="folio_registro_publico"
            class="form-control custom-input" placeholder="Folio" required>
    </div>
    <div class="col">
        <label for="">Fecha de registro publico</label>
        <input type="text" name="fecha_registro_publico" id="fecha_registro_publico"
            class="form-control custom-input" placeholder="Fecha" required>
    </div>
</div>
<!--Si es persona moral-->
<div class="row" id="datos_proveedor_moral" style="display: none;">
    <div class="col" >
        <label>Nombre del representante</label>
        <input type="text" name="nombre_proveedor_representante" id="nombre_proveedor_representante"
            class="form-control custom-input" placeholder="Nombre de la persona representante" required>
    </div>
    <div class="col">
        <label for="">Caracter del representante del proveedor</label>
        <select name="caracter_representante_proveedor" id="caracter_representante_proveedor"
            class="form-select custom-select" required>
            <option value="">Selecciona el tipo..</option>
            <option value="APODERADO">APODERADO</option>
            <option value="REPRESENTANTE LEGAL">REPRESENTANTE LEGAL</option>
            <option value="ADMINISTRADOR ÚNICO ">ADMINISTRADOR ÚNICO</option>
            <option value="PRESIDENTE DEL CONSEJO DE ADMINISTRACIÓN">PRESIDENTE DEL CONSEJO DE ADMINISTRACIÓN</option>
        </select>
    </div>
    <div class="col">
        <label for="">Instrumento notarial o poder otorgado</label>
        <input type="text" name="instrumento_proveedor" id="instrumento_proveedor"
            class="form-control custom-input" placeholder="Instrumento publico que da orgien" required>
    </div>
</div>
<!--Si es persona moral datos del representante-->
<div class="row" id="representante_moral" style="display: none;">
    <div class="col">
        <label for="">Instrumento publico que da orgien al repesentante </label>
        <input type="text" name="instrumento_proveedor" id="instrumento_proveedor"
            class="form-control custom-input" placeholder="Instrumento publico que da orgien" required>
    </div>

</div>


<script>
    function mostrarCampos() {
        var tipoSeleccionado = document.getElementById("tipo_proveedor").value;

        if (tipoSeleccionado === "Persona Fisica") {

            document.getElementById("input_proveedor_fisica").style.display = "block";
            document.getElementById("input_proveedor_moral").style.display = "none";
            document.getElementById("campos_persona_fisica").style.display = "block";
            document.getElementById("campos_persona_moral").style.display = "none";
            document.getElementById("datos_proveedor_moral").style.display = "none";
            document.getElementById("representante_moral").style.display = "none";

        } else if (tipoSeleccionado === "Persona Moral") {
            document.getElementById("input_proveedor_fisica").style.display = "none";
            document.getElementById("input_proveedor_moral").style.display = "block";
            document.getElementById("campos_persona_fisica").style.display = "none";
            document.getElementById("campos_persona_moral").style.display = "block";
            document.getElementById("datos_proveedor_moral").style.display = "block";
            document.getElementById("representante_moral").style.display = "block";
        } else {
            document.getElementById("input_proveedor_fisica").style.display = "none";
            document.getElementById("input_proveedor_moral").style.display = "none";
            document.getElementById("campos_persona_fisica").style.display = "none";
            document.getElementById("campos_persona_moral").style.display = "none";
            document.getElementById("datos_proveedor_moral").style.display = "none";
            document.getElementById("representante_moral").style.display = "none";


        }
    }
</script>
