@csrf

<div class="row d-grid gap-2 mx-auto">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Tipo de persona</label>
                <select name="persona_id" id="tipo_proveedor" class="form-select custom-select" required
                    onchange="mostrarCampos()">
                    <option value="">Selecciona el tipo..</option>
                    @foreach ($tipopersona as $tipoperson)
                        <option value="{{ $tipoperson->id_persona }}">
                            {{ $tipoperson->nombre_persona }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">RFC del proveedor</label>
                <input type="text" name="rfc" id="rfc" class="form-control custom-input"
                    placeholder="RFC" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col">
                <div class="form-group">
                    <label>Nombre del proveedor</label>
                    <input type="text" name="nombre" class="form-control custom-input"
                        placeholder="Nombre de la persona moral" req>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="form-group">
                <label for="">Nacionalidad</label>
                <select name="nacionalidad" id="nacionalidad_proveedor" class="form-select custom-select" required>
                    <option value="">Selecciona el tipo..</option>
                    <option value="Mexicana">Mexicana</option>
                    <option value="Extragnera">Extragnera</option>
                    <option value="Otra">Otra</option>
                </select>
            </div>
        </div>
        <div class="col-7">
            <div class="form-group">
                <label for="">Domicilio</label>
                <input type="text" name="calle" id="domicilio proveedor" class="form-control custom-input"
                    placeholder="Calle" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <input type="text" name="municipio" id="domicilio proveedor" class="form-control custom-input"
                    placeholder="Municipio" required>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <input type="number" name="codigo_postal" id="domicilio proveedor" class="form-control custom-input"
                    placeholder="Codigo postal" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="text" name="estado" id="domicilio proveedor" class="form-control custom-input"
                    placeholder="Estado" required>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <input type="text" name="pais" id="domicilio proveedor" class="form-control custom-input"
                    placeholder="Pais" required>
            </div>
        </div>
    </div>

    <!--Si es persona fisica-->
    <div class="row" id="campos_persona_fisica" style="display: none;">
        <!-- Campos para Persona Fisica -->
        <div class="col">
            <label>Documento de acreditacion:</label>
            <input type="text" name="documento_expedicion" id="documento_acreditacion_proveedor"
                class="form-control custom-input" placeholder="Documento de acreditacion">
        </div>
        <div class="col">
            <label>Expedida por:</label>
            <input type="text" name="institucion_expedida" id="acreditacion_proveedor"
                class="form-control custom-input" placeholder="Institucion que acredita">
        </div>
    </div>
    <!--Si es persona moral-->
    <div class="row" id="campos_persona_moral" style="display: none;">
        <!-- Campos para Persona Moral -->
        <div class="col">
            <label for="">Instrumento publico que da origen</label>
            <input type="text" name="instrumento_publico" id="instrumento_proveedor_moral"
                class="form-control custom-input" placeholder="Instrumento publico que da origen">
        </div>
        <div class="col">
            <label for="">Registro publico</label>
            <input type="text" name="registro_publico" id="nombre_registro_publico"
                class="form-control custom-input" placeholder="Registro publico">
        </div>
        <div class="col">
            <label for="">Folio de registro publico</label>
            <input type="text" name="folio_registro" id="folio_registro_publico"
                class="form-control custom-input" placeholder="Folio">
        </div>
        <div class="col">
            <label for="">Fecha de registro publico</label>
            <input type="text" name="fecha_registro" id="fecha_registro_publico"
                class="form-control custom-input" placeholder="Fecha">
        </div>
    </div>
    <!--Si es persona moral-->
    <div class="row" id="datos_proveedor_moral" style="display: none;">
        <div class="col">
            <label>Nombre del representante</label>
            <input type="text" name="representante" id="nombre_proveedor_representante"
                class="form-control custom-input" placeholder="Nombre de la persona representante">
        </div>
        <div class="col">
            <label for="">Caracter del representante del proveedor</label>
            <select name="caracter_id" id="tipo_proveedor" class="form-select custom-select"
                onchange="mostrarCampos()">
                <option value="">Selecciona el tipo..</option>
                @foreach ($tipocaracters as $tipocaracter)
                    <option value="{{ $tipocaracter->id_caracter }}">
                        {{ $tipocaracter->nombre_caracter }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <!--Si es persona moral datos del representante-->
    <div class="row" id="representante_moral" style="display: none;">
        <div class="col">
            <label for="">Instrumento publico que da orgien al repesentante </label>
            <input type="text" name="instrumento_notarial_representante" id="instrumento_proveedor"
                class="form-control custom-input" placeholder="Instrumento publico que da orgien">
        </div>
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
