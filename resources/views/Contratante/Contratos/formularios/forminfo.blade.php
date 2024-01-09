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
        <select class="form-control custom-select" name="tipo_contrato_id">
            <option>Selecciona ... </option>
            @foreach ($tiposcontratos as $tiposcontrato)
                <option value="{{ $tiposcontrato->id_tipo_contrato }}">
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
                placeholder="Garantia de reduccion">
        </div>
    @endif
    <div class="col">
        <label>La contratacion es previa a la autorizacion de su presupuesto</label>
        <div class="form-check">
            <input class="form-check-input custom-input" type="radio" name="autorizacion_previa"
                id="autorizacion_previa" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Si es previa
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input custom-input" type="radio" name="autorizacion_previa"
                id="autorizacion_previa" value="0" checked>
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
    <div class="d-grid gap-2 col-8 mx-auto">
        <label>Selecciona el proveedor</label>
        <select name="proveedor" id="tipo_proveedor" class="form-select custom-select">
            <option value="">Selecciona el tipo..</option>
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id_proveedor }}">
                    {{ $proveedor->nombre }}
                </option>
            @endforeach
        </select>
    </div>
</div>
