@csrf
<div class="row d-grid gap-2 mx-auto">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Tipo de persona</label>
                <select name="persona_id" id="tipo_proveedor" class="form-select custom-select" required onchange="mostrarCampos()">
                    <option value="">Selecciona el tipo..</option>
                    @foreach ($tipopersona as $tipoperson)
                        <option value="{{ $tipoperson->id_persona }}"
                            {{ $proveedor->persona_id == $tipoperson->id_persona ? 'selected' : '' }}>
                            {{ $tipoperson->nombre_persona }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">RFC del proveedor</label>
                <input type="text" name="rfc" id="rfc" class="form-control custom-input" placeholder="RFC"
                    required value="{{ $proveedor->rfc }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <div class="col">
                <div class="form-group">
                    <label>Nombre del proveedor</label>
                    <input type="text" name="nombre" class="form-control custom-input"
                        placeholder="Nombre de la persona moral" required value="{{ $proveedor->nombre }}">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-5">
            <div class="form-group">
                <label for="">Nacionalidad del proveedor</label>
                <select name="nacionalidad" id="nacionalidad_proveedor" class="form-select custom-select" required>
                    <option value="">Selecciona el tipo..</option>
                    <option value="Mexicana" {{ $proveedor->nacionalidad == 'Mexicana' ? 'selected' : '' }}>Mexicana
                    </option>
                    <option value="Extrangeria" {{ $proveedor->nacionalidad == 'Extrangeria' ? 'selected' : '' }}>
                        Extrangeria</option>
                    <option value="Otra" {{ $proveedor->nacionalidad == 'Otra' ? 'selected' : '' }}>Otra</option>
                </select>
            </div>
        </div>
        <div class="col-7">
            <div class="form-group">
                <label for="">Domicilio</label>
                <input type="text" name="calle" id="domicilio_proveedor" class="form-control custom-input"
                    placeholder="Calle" required value="{{ $proveedor->Domicilios->calle }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <input type="text" name="municipio" class="form-control custom-input" placeholder="Municipio"
                    required value="{{ $proveedor->Domicilios->municipio }}">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <input type="number" name="codigo_postal" class="form-control custom-input" placeholder="Codigo postal"
                    required value="{{ $proveedor->Domicilios->codigo_postal }}">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="text" name="estado" class="form-control custom-input" placeholder="Estado" required
                    value="{{ $proveedor->Domicilios->estado }}">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="text" name="pais" class="form-control custom-input" placeholder="Pais" required
                    value="{{ $proveedor->Domicilios->pais }}">
            </div>
        </div>
    </div>
    


    @if ($proveedor->persona_id === 1)
        <!-- Si es persona física, se mostrarán los campos -->
        <div class="row" id="campos_persona_fisica">
            <!-- Campos para Persona Fisica -->
            <div class="col">
                <label>Documento de acreditacion:</label>
                <input type="text" name="documento_expedicion" id="documento_acreditacion_proveedor"
                    class="form-control custom-input" placeholder="Documento de acreditacion"
                    value="{{ $proveedor->documento_expedicion }}">
            </div>
            <div class="col">
                <label>Expedida por:</label>
                <input type="text" name="institucion_expedida" id="acreditacion_proveedor"
                    class="form-control custom-input" placeholder="Institucion que acredita"
                    value="{{ $proveedor->institucion_expedida }}">
            </div>
        </div>
    @endif

    @if ($proveedor->persona_id === 2)
        <!-- Si es persona moral, se mostrarán los campos -->
        <div class="row" id="campos_persona_moral">
            <!-- Campos para Persona Moral -->
            <div class="col">
                <label for="">Instrumento público</label>
                <input type="text" name="instrumento_publico" id="instrumento_proveedor_moral"
                    class="form-control custom-input" placeholder="Instrumento público que da origen"
                    value="{{ $proveedor->instrumento_publico }}">
            </div>
            <div class="col">
                <label for="">Registro público</label>
                <input type="text" name="registro_publico" id="nombre_registro_publico"
                    class="form-control custom-input" placeholder="Registro público"
                    value="{{ $proveedor->registro_publico }}">
            </div>
            <div class="col">
                <label for="">Folio de registro público</label>
                <input type="text" name="folio_registro" id="folio_registro_publico"
                    class="form-control custom-input" placeholder="Folio" value="{{ $proveedor->folio_registro }}">
            </div>
            <div class="col">
                <label for="">Fecha de registro público</label>
                <input type="text" name="fecha_registro" id="fecha_registro_publico"
                    class="form-control custom-input" placeholder="Fecha" value="{{ $proveedor->fecha_registro }}">
            </div>
        </div>


        <!-- Si es persona moral, se mostrarán los campos -->
        <div class="row" id="datos_proveedor_moral">
            <div class="col">
                <label>Nombre del representante</label>
                <input type="text" name="representante" id="nombre_proveedor_representante"
                    class="form-control custom-input" placeholder="Nombre de la persona representante"
                    value="{{ $proveedor->representante }}">
            </div>
            <div class="col">
                <label for="">Caracter del representante del proveedor</label>
                <select name="caracter_id" id="tipo_proveedor" class="form-select custom-select">
                    <option value="">Selecciona el tipo..</option>
                    @foreach ($tipocaracters as $tipocaracter)
                        <option value="{{ $tipocaracter->id_caracter }}"
                            {{ $proveedor->caracter_id == $tipocaracter->id_caracter ? 'selected' : '' }}>
                            {{ $tipocaracter->nombre_caracter }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Si es persona moral, se mostrarán los campos -->
        <div class="row" id="representante_moral">
            <div class="col">
                <label for="">Instrumento público que da origen al representante</label>
                <input type="text" name="instrumento_notarial_representante" id="instrumento_proveedor"
                    class="form-control custom-input" placeholder="Instrumento público que da origen">
            </div>
        </div>
    @endif

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
