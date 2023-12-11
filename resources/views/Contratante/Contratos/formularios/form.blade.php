@csrf

<div class="row">
    <div class="col">
        <p>CONTRATO
            <strong>
                @if ($requisicion->tipo_id == 1)
                    <strong>CERRADO</strong>
                @else
                    <strong>ABIERTO</strong>
                @endif
                No.{{ isset($requisicion) ? $requisicion->no_requisicion : old('no_requisicion') }}
            </strong>
            PARA LA PRESTACION DEL SERVICIO DE:
            <input type="text" name="descripcion_contrato" id="descripcion_contrato" class="form-control"
                onkeyup="actualizarDescripcion()">
            PROVEEDOR:
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="proveedor_contrato" id="proveedor_contrato"
                onkeyup="actualizarproveedor()">
            <select class="form-select " id="select-proveedor" name="tipo_proveedor">
                <option selected>Selecciona</option>
                <option value="Persona Fisica">Persona Fisica</option>
                <option value="Persona Moral">Persona Moral</option>
            </select>
        </div>
        VIGENCIA:
        <input type="text" name="vigencia_contrato" id="vigencia_contrato" class="form-control">
        </p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <p>CONTRATO
            @if ($requisicion->tipo_id == 1)
                <strong>CERRADO</strong>
            @else
                <strong>ABIERTO</strong>
            @endif
            PARA LA PRESTACIÓN DE SERVICIOS DE
            <strong><span id="descripcion">SIN ASIGNAR</span></strong>
            ,CON CARÁCTER
            @if ($requisicion->pais_id == 1)
                <strong>NACIONAL</strong>
            @else
                <strong>INTERNACIONAL BAJO COBERTURA DE LOS TRATADOS</strong>
            @endif
            QUE CELEBRAN, POR UNA PARTE, EL EJECUTIVO FEDERAL POR CONDUCTO DE LA
            <strong>{{ isset($requisicion) ? $requisicion->Dependencias->nombre_dependencia : old('dependencia_id') }}</strong>
            , EN LO SUCESIVO
            <strong>DEPENDENCIA</strong>
            , REPRESENTADA POR
            <strong>
                {{ $empleado->nombre }} {{ $empleado->apellido_paterno }} {{ $empleado->apellido_materno }}
            </strong>, EN SU CARÁCTER DE <strong>{{ $empleado->Cargos->nombre_cargo }}</strong>, Y POR LA OTRA,
            <strong><span id="proveedor">SIN ASIGNAR</span></strong>
            EN LO SUCESIVO “EL PROVEEDOR”,

        <div id="textoPersonaMoral" style="display: none;">
            REPRESENTADA POR <input type="text" class="form-control" name="representante_proveedor"
                id="representante_proveedor" placeholder="NOMBRE DEL REPRESENTANTE">, EN SU CARÁCTER DE
            <select name="cargo_representate" id="cargo_representate" class="form-select">
                <option value="">APODERADO</option>
                <option value="">REPRESENTANTE LEGAL</option>
                <option value="">ADMINISTRADOR ÚNICO</option>
                <option value="">PRESIDENTE DEL
                    CONSEJO DE ADMINISTRACIÓN</option>
            </select>
            , A QUIENES DE MANERA CONJUNTA SE LES DENOMINARÁ “LAS PARTES”, AL TENOR DE LAS
            DECLARACIONES Y CLÁUSULAS SIGUIENTES:
        </div>
        <div id="textoPersonaFisica">
            , A QUIENES DE MANERA CONJUNTA SE LES DENOMINARÁ “LAS PARTES”, AL TENOR DE LAS
            DECLARACIONES Y CLÁUSULAS SIGUIENTES:
        </div>
        </p>
    </div>

</div>
<div class="row">
    <h5>
        <strong>DECLARACIONES</strong>
    </h5>
</div>
<div class="row">
    <div class="col">
        <ol class="roman">
            <li><strong>“LA DEPENDENCIA”</strong> declara que:
                <ol class="decimal">
                    <li>
                        <p>
                            QUE ES UN ORGANISMO DESCENTRALIZADO DE LA ADMINISTRACIÓN PÚBLICA FEDERAL, CON
                            PERSONALIDAD JURÍDICA Y PATRIMONIO PROPIOS, DE CONFORMIDAD CON LO DISPUESTO
                            POR LOS ARTÍCULOS 1°, 3°, FRACCIÓN I, Y 45 DE LA LEY ORGÁNICA DE LA ADMINISTRACIÓN
                            PÚBLICA FEDERAL, 5° DE LA LEY FEDERAL DE ENTIDADES PARAESTATALES, ASÍ COMO 5º, 207 Y
                            208 DE LA LEY DEL INSTITUTO DE SEGURIDAD Y SERVICIOS SOCIALES DE LOS TRABAJADORES
                            DEL ESTADO.
                        </p>
                    </li>
                    <li>
                        <p>
                            SU REPRESENTANTE, LA <strong>
                                {{ $empleado->nombre }} {{ $empleado->apellido_paterno }}
                                {{ $empleado->apellido_materno }}
                            </strong>, SE ENCUENTRA FACULTADA PARA SUSCRIBIR
                            EL PRESENTE INSTRUMENTO LEGAL EN REPRESENTACIÓN DEL INSTITUTO DE SEGURIDAD Y SERVICIOS
                            SOCIALES
                            DE LOS TRABAJADORES DEL ESTADO, DE CONFORMIDAD CON LO ESTABLECIDO EN LA ESCRITURA PÚBLICA
                            NÚMERO
                            46,460, LIBRO 1,265 DE FECHA DIECIOCHO DE JULIO DEL AÑO DOS MIL VEINTIDÓS, PASADA ANTE LA FE
                            DEL
                            LICENCIADO ALBERTO T. SÁNCHEZ COLÍN, NOTARIO PÚBLICO NÚMERO 83 DE LA CIUDAD DE MÉXICO, QUIEN
                            PODRÁ
                            SER SUSTITUIDO EN CUALQUIER MOMENTO EN SU CARGO O FUNCIONES, SIN QUE ELLO IMPLIQUE LA
                            NECESIDAD DE
                            ELABORAR CONVENIO MODIFICATORIO.</p>
                    </li>
                    <li>
                        <p>
                            DE CONFORMIDAD CON EL ARTÍCULO 26, APARTADO B, FRACCIÓN I Y X, DEL REGLAMENTO ÓRGANICO DE
                            LAS
                            DELEGACIONES ESTATALES Y REGIONALES DEL INSTITUTO DE SEGURIDAD Y SERVICIOS SOCIALES DE LOS
                            TRABAJADORES DEL ESTADO SUSCRIBE EL PRESENTE INSTRUMENTO LEGAL COMO ADMINISTRADOR DEL
                            CONTRATO
                            EL
                            <select name="admincontrato" id="select-admincontrato">
                                @foreach ($AdminContratos as $AdminContrato)
                                    <option value="{{ $AdminContrato->num_empleado }}">{{ $AdminContrato->nombre }}
                                        {{ $AdminContrato->apellido_paterno }}</option>
                                @endforeach
                            </select>,
                            <strong>
                                <span name="cargo-admincontrato" id="cargoMostrado">CARGO DEL ADMINISTRADOR DEL
                                    CONTRATO</span>
                            </strong>,REGISTRO FEDERAL DE CONTRIBUYENTES
                            <strong>
                                <span>RFC DEL ADMINISTRADOR DEL CONTRATO:</span>
                            </strong>
                            , FACULTADO PARA
                            ADMINISTRAR EL CUMPLIMIENTO DE
                            LAS OBLIGACIONES QUE DERIVEN DEL OBJETO DEL PRESENTE CONTRATO, QUIEN PODRÁ SER SUSTITUIDO EN
                            CUALQUIER MOMENTO, BASTANDO PARA TALES EFECTOS UN COMUNICADO POR ESCRITO Y FIRMADO POR EL
                            SERVIDOR PÚBLICO FACULTADO PARA ELLO, INFORMANDO A <strong>“EL PROVEEDOR”</strong> PARA LOS
                            EFECTOS DEL
                            PRESENTE
                            CONTRATO.
                        </p>
                    </li>
                    <li>
                        <p>
                            DE CONFORMIDAD CON LOS ARTÍCULOS 34 Y 37 FRACCIONES I Y XIII DEL REGLAMENTO ÓRGANICO DE LAS
                            DELEGACIONES ESTATALES Y REGIONALES DEL INSTITUTO DE SEGURIDAD Y SERVICIOS SOCIALES DE LOS
                            TRABAJADORES DEL ESTADO, SUSCRIBE EL PRESENTE INSTRUMENTO LEGAL,
                            <strong>
                                <span>{{ $empleadomateriales->nombre }}
                                    {{ $empleadomateriales->apellido_paterno }}
                                    {{ $empleadomateriales->apellido_materno }}</span>
                            </strong>,
                            <strong>
                                <span>{{ $empleadomateriales->Cargos->nombre_cargo }}</span>
                            </strong>,
                            , REGISTRO FEDERAL DECONTRIBUYENTES
                            <strong><span>{{ $empleadomateriales->rfc }} RFC</span></strong>,
                            FACULTADA PARA REALIZAR LA CONTRATACIÓN DE LOS SERVICIOS GENERALESY SUPERVISIÓN DE LOS
                            SERVICIOS
                            REQUERIDOS POR LAS ÁREAS ADMINISTRATIVAS Y LOS CENTROS DE TRABAJO DELEGACIONALES, CON CARGO
                            A LAS
                            PARTIDAS PRESUPUESTALES QUE SEAN ADMINISTRADAS EN FORMA DESCONCENTRADA POR LA DELEGACIÓN, DE
                            CONFORMIDAD
                            CON LOS PROCEDIMIENTOS AUTORIZADOS Y EN APEGO A
                            LA NORMATIVIDAD APLICABLE, QUIEN PODRA SER SUSTITUIDA EN CUALQUIER MOMENTO, BASTANDO PARA
                            TALES
                            EFECTOS UN COMUNICADO POR ESCRITO, FIRMADO POR EL SERVIDOR PUBLICO FACULTADO PARA ELLO,
                            INFORMANDO A <strong> “EL PROVEDOR”</strong> PARA LOS EFECTOS DEL PRESENTE CONTRATO.
                        </p>
                    </li>
                    <li>
                        <p>
                            LA ADJUDICACIÓN DEL PRESENTE CONTRATO SE REALIZÓ MEDIANTE EL PROCEDIMIENTO DE
                            <strong>{{ isset($requisicion) ? $requisicion->Tipos->nombre_tipo : old('dependencia_id') }}</strong>,
                            AL AMPARO DE LO ESTABLECIDO EN LOS ARTÍCULOS 134 DE LA CONSTITUCIÓN POLÍTICA DE LOS
                            ESTADOS UNIDOS MEXICANOS; <strong>ARTÍCULOS 26 FRACCIÓN III, 40 SEGUNDO Y TERCER PÁRRAFOS;
                                42 PRIMER
                                Y TERCER PÁRRAFO DE LA LEY DE ADQUISICIONES, ARRENDAMIENTOS Y SERVICIOS DEL SECTOR
                                PÚBLICO.</strong>
                        </p>
                    </li>
                    <li>
                        <p>
                            <strong>“LA DEPENDENCIA”</strong> CUENTA CON SUFICIENCIA PRESUPUESTARIA OTORGADA MEDIANTE
                            OFICIO
                            <input type="text" class="form-control" name="oficio_suficiencia"
                                placeholder="OFICIO DE SUFICIENCIA PRESUPUESTAL">
                            DE FECHA DE
                            <input type="text" class="form-control" name="fecha_oficio_suficiencia"
                                placeholder="FECHA DEL OFICIO DE SUFICIENCIA PRESUPUESTAL">
                            EMITIDO POR LA
                            <strong><span>{{ $empleadofinanzas->nombre }} {{ $empleadofinanzas->apellido_paterno }}
                                    {{ $empleadofinanzas->apellido_materno }}</span></strong>,
                            <strong><span>{{ $empleadofinanzas->Cargos->nombre_cargo }}</span></strong>.

                            @if ($requisicion->pluralidad == 1)
                                <p>
                                    La SHCP autorizó la plurianualidad mediante el
                                    oficio
                                    Número de Oficio <input type="text" class="form-control"
                                        name="oficio_plurianualidad" placeholder="Numero de oficio">
                                </p>
                            @else
                            @endif
                        </p>
                    </li>
                    <li>
                        PARA EFECTOS FISCALES LAS AUTORIDADES HACENDARIAS DE CONFORMIDAD CON LA CONSTANCIA DE
                        SITUACIÓN FISCAL GENERADA POR EL SAT (SISTEMA DE ADMINISTRACIÓN TRIBUTARIA) LE HAN ASIGNADO EL
                        REGISTRO FEDERAL DE CONTRIBUYENTES: <strong>ISS6001015A3</strong> .
                    </li>
                    <li>
                        TIENE ESTABLECIDO SU DOMICILIO EN <strong>CALLE AMAPOLAS, NÚMERO 100 COLONIA REFORMA, C.P 68050
                            OAXACA
                            DE JUÁREZ, OAXACA</strong>, MISMO QUE SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE
                        CONTRATO.
                    </li>
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
                        <li>
                            <p>
                                De la revisión al historial de cumplimiento en materia de contrataciones en el Registro
                                Único de Contratistas, se advierte que <strong>“EL PROVEEDOR”</strong> cuenta con un
                                grado de cumplimiento <strong>{{ $porcentaje_garantia }}</strong>, por lo que
                                <strong>“LA
                                    DEPENDENCIA”</strong> determina procedente efectuar la reducción del monto de la
                                garantía por un porcentaje de <input type="text" name="reduccion_porcentaje"
                                    placeholder="0%">.
                            </p>
                        </li>
                    @endif
                </ol>
            </li>
            <li>
                <label id="strongPersonaFisica"><strong>“EL PROVEEDOR”</strong> DECLARA QUE: </label>
                <label id="strongPersonaMoral"><strong>“EL PROVEEDOR”</strong>, POR CONDUCTO DE SU REPRESENTANTE DECLARA
                    QUE:</label>
                <ol class="decimal">
                    <li>PERTENECE AL 2</li>
                    <li>PERTENECE AL 2</li>
                </ol>
            </li>
        </ol>
    </div>
</div>

</div>
<script>
    //Funcion para reflejar la descripcion del contrato
    function actualizarDescripcion() {
        var input = document.getElementById('descripcion_contrato');
        var span = document.getElementById('descripcion');
        span.textContent = input.value;
    }
    //actualiza en toda la ventana el proveedor 
    function actualizarproveedor() {
        var input = document.getElementById('proveedor_contrato');
        var span = document.getElementById('proveedor');
        span.textContent = input.value;
    }
    //actualiza la informacion del tipo de persona fisica o moral
    document.getElementById('select-proveedor').addEventListener('change', function() {
    var personaSeleccionada = this.value;

    var strongPersonaFisica = document.getElementById('strongPersonaFisica');
    var strongPersonaMoral = document.getElementById('strongPersonaMoral');

    if (personaSeleccionada === 'Persona Fisica') {
        document.getElementById('textoPersonaMoral').style.display = 'none';
        document.getElementById('textoPersonaFisica').style.display = 'block';
        
        // Actualizar el contenido de los strongs para Persona Física
        strongPersonaFisica.innerHTML = '<strong>“EL PROVEEDOR”</strong> DECLARA QUE:';
        strongPersonaMoral.innerHTML = ''; // Limpiar contenido si es Persona Moral
    } else if (personaSeleccionada === 'Persona Moral') {
        document.getElementById('textoPersonaFisica').style.display = 'none';
        document.getElementById('textoPersonaMoral').style.display = 'block';
        
        // Actualizar el contenido de los strongs para Persona Moral
        strongPersonaFisica.innerHTML = ''; // Limpiar contenido si es Persona Física
        strongPersonaMoral.innerHTML = '<strong>“EL PROVEEDOR”</strong>, POR CONDUCTO DE SU REPRESENTANTE DECLARA QUE:';
    } else {
        document.getElementById('textoPersonaFisica').style.display = 'none';
        document.getElementById('textoPersonaMoral').style.display = 'none';

        // Limpiar contenido si no se selecciona ninguna opción
        strongPersonaFisica.innerHTML = '';
        strongPersonaMoral.innerHTML = '';
    }
});



    $('#select-admincontrato').change(function() {
        var numEmpleado = $(this).val();

        $.ajax({
            url: '/Contratante/contratos/create/obtenerCargo/' + numEmpleado,
            type: 'GET',
            success: function(data) {
                $('#cargoMostrado').text(data);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>
