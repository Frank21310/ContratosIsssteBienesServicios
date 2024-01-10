<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
        }

        html {
            margin: 0;
        }

        body {
            font-family: 'Montserrat';
            margin: 3cm 0cm 0.49cm 0cm;
            color: rgb(0, 0, 0);
            line-height: 0.4527p;
        }

        header {
            position: fixed;
            top: 0.7cm;
            right: 1.8cm;
            left: 1.8cm;
            color: rgb(0, 0, 0);
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            line-height: 0.3527p;
            font-size: 10px;
            word-spacing: 0.5px;
        }

        main {
            text-align: justify;
            margin-right: 2.4cm;
            margin-left: 1.8cm;
            font-size: 13px;
            font-family: 'Montserrat', sans-serif;
            word-spacing: 2.5px;
        }

        .Titulos {
            font-family: 'Montserrat', sans-serif;
            font-weight: bold;
            font-size: 15px;
            text-align: center;
        }

        .lista {
            list-style: none;
            counter-reset: roman-counter;
            padding-left: 0;
            margin-left: 0;
        }

        .sublista {
            padding-left: 0;
            margin-left: 0;
        }

        footer {
            color: white;
            text-align: center;
        }

        .row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px
        }

        .col,
        .col-1,
        .col-10,
        .col-11,
        .col-12,
        .col-2,
        .col-3,
        .col-4,
        .col-5,
        .col-6,
        .col-7,
        .col-8,
        .col-9,
        .col-auto {
            position: relative;
            width: 100%;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px
        }

        .col {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%
        }

        .col-auto {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: auto;
            max-width: none
        }

        .col-1 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
            max-width: 8.333333%
        }

        .col-2 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-3 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .col-4 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .col-5 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
            max-width: 41.666667%
        }

        .col-6 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .col-7 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
            max-width: 58.333333%
        }

        .col-8 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%
        }

        .col-9 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%
        }

        .col-10 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
            max-width: 83.333333%
        }

        .col-11 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
            max-width: 91.666667%
        }

        .col-12 {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }
    </style>

</head>

<body>
    <header>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <img src="assets/img/LogoNew2.png" alt="" width="300px"
                            style="margin: .5cm 2.5cm 0.49cm -.25cm;">
                    </td>
                    <td>
                        <p style="text-align: justify;">CONTRATO
                            @if ($requisicion->tipo_id = 1)
                                CERRADO
                            @else
                                ABIERTO
                            @endif No. {{ $requisicion->no_requisicion }} PARA LA
                            PRESTACION DEL SERVICIO DE {{ $contrato->descripcion_contrato }}.
                            PROVEEDOR:
                            {{ $contrato->Proveedor->nombre }} VIGENCIA: {{ $contrato->vigencia_contrato }}.
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </header>
    <main>

        <div class="row">
            <div class="col">
                <p>CONTRATO
                    <strong>
                        @if ($requisicion->tipo_id = 1)
                            <strong>CERRADO</strong>
                        @else
                            <strong>ABIERTO</strong>
                        @endif
                    </strong>
                    PARA LA PRESTACIÓN DE SERVICIOS DE
                    <strong>
                        {{ $contrato->descripcion_contrato }}
                    </strong>
                    ,CON CARÁCTER
                    @if ($requisicion->pais_id == 1)
                        <strong>NACIONAL</strong>
                    @else
                        <strong>INTERNACIONAL BAJO COBERTURA DE LOS TRATADOS</strong>
                    @endif
                    QUE CELEBRAN POR UNA PARTE, EL EJECUTIVO FEDERAL POR CONDUCTO DEL
                    <strong>
                        INSTITUTO DE SEGURIDAD Y SERVICIOS SOCIALES DE LOS TRABAJADORES DEL ESTADO
                    </strong>
                    , A QUIEN
                    EN LO SUCESIVO SE LE DENOMINARÁ
                    <strong>
                        “LA ENTIDAD”
                    </strong>,
                    REPRESENTADO POR LA
                    <strong>
                        {{ $empleadosubdelegado->nombre }}
                        {{ $empleadosubdelegado->apellido_paterno }}
                        {{ $empleadosubdelegado->apellido_materno }}</strong>,
                    <strong>
                        {{ $empleadosubdelegado->Cargos->nombre_cargo }}
                    </strong>
                    , POR LA OTRA,
                    <strong>
                        {{ $contrato->Proveedor->nombre_proveedor }}
                    </strong>, EN LO SUCESIVO “EL PROVEEDOR”,
                    @if ($contrato->Proveedor->persona_id == 2)
                        REPRESENTADA POR
                        <strong>
                            {{ $contrato->Proveedor->representante_nombre }}
                        </strong>
                        , EN SU CARÁCTER DE
                        <strong>
                            {{ $contrato->Proveedor->Caracter->nombre_tipo_caracter }}
                        </strong>
                    @endif
                    REPRESENTADO POR EL
                    ADMINISTRADOR
                    ÚNICO <strong>{{ $contrato->AdminContratos->nombre }}
                        {{ $contrato->AdminContratos->apellido_paterno }}
                        {{ $contrato->AdminContratos->apellido_materno }}</strong>, A QUIENES DE MANERA CONJUNTA SE LES
                    DENOMINARÁ <strong>“LAS PARTES”</strong>, AL
                    TENOR DE LAS DECLARACIONES Y CLÁUSULAS SIGUIENTES:
                </p>
            </div>
        </div>
        <div class="Titulos">
            <h5>
                DECLARACIONES
            </h5>
        </div>
        <div class="row Cuerpo">
            <div class="col">
                <ol class="lista">
                    <li> <strong>“LA DEPENDENCIA”</strong> DECLARA QUE:
                        <ol class="sublista">
                            <li>
                                <p>QUE ES UN ORGANISMO DESCENTRALIZADO DE LA ADMINISTRACIÓN PÚBLICA FEDERAL, CON
                                    PERSONALIDAD JURÍDICA Y PATRIMONIO PROPIOS, DE CONFORMIDAD CON LO DISPUESTO
                                    POR LOS ARTÍCULOS 1°, 3°, FRACCIÓN I, Y 45 DE LA LEY ORGÁNICA DE LA ADMINISTRACIÓN
                                    PÚBLICA FEDERAL, 5° DE LA LEY FEDERAL DE ENTIDADES PARAESTATALES, ASÍ COMO 5º, 207 Y
                                    208 DE LA LEY DEL INSTITUTO DE SEGURIDAD Y SERVICIOS SOCIALES DE LOS TRABAJADORES
                                    DEL ESTADO.
                                </p>
                            </li>
                            <li>
                                <p>
                                    SU REPRESENTANTE, LA <strong>{{ $empleadosubdelegado->nombre }}
                                        {{ $empleadosubdelegado->apellido_paterno }}
                                        {{ $empleadosubdelegado->apellido_materno }}</strong>, SE ENCUENTRA FACULTADA
                                    PARA SUSCRIBIR
                                    EL PRESENTE INSTRUMENTO LEGAL EN REPRESENTACIÓN DEL INSTITUTO DE SEGURIDAD Y
                                    SERVICIOS
                                    SOCIALES
                                    DE LOS TRABAJADORES DEL ESTADO, DE CONFORMIDAD CON LO ESTABLECIDO EN LA ESCRITURA
                                    PÚBLICA
                                    NÚMERO
                                    46,460, LIBRO 1,265 DE FECHA DIECIOCHO DE JULIO DEL AÑO DOS MIL VEINTIDÓS, PASADA
                                    ANTE LA FE
                                    DEL
                                    LICENCIADO ALBERTO T. SÁNCHEZ COLÍN, NOTARIO PÚBLICO NÚMERO 83 DE LA CIUDAD DE
                                    MÉXICO, QUIEN
                                    PODRÁ
                                    SER SUSTITUIDO EN CUALQUIER MOMENTO EN SU CARGO O FUNCIONES, SIN QUE ELLO IMPLIQUE
                                    LA
                                    NECESIDAD DE
                                    ELABORAR CONVENIO MODIFICATORIO.
                                </p>
                            </li>
                            <li>
                                <p>
                                    DE CONFORMIDAD CON EL ARTÍCULO 26, APARTADO B, FRACCIÓN I Y X, DEL REGLAMENTO
                                    ÓRGANICO DE
                                    LAS
                                    DELEGACIONES ESTATALES Y REGIONALES DEL INSTITUTO DE SEGURIDAD Y SERVICIOS SOCIALES
                                    DE LOS
                                    TRABAJADORES DEL ESTADO SUSCRIBE EL PRESENTE INSTRUMENTO LEGAL COMO ADMINISTRADOR
                                    DEL
                                    CONTRATO
                                    EL <strong>{{ $contrato->AdminContratos->nombre }}
                                        {{ $contrato->AdminContratos->apellido_paterno }}
                                        {{ $contrato->AdminContratos->apellido_materno }}</strong>
                                    ,
                                    <strong>{{ $contrato->AdminContratos->Cargos->nombre_cargo }}
                                    </strong>
                                    ,REGISTRO FEDERAL DE CONTRIBUYENTES
                                    <strong>
                                        {{ $contrato->AdminContratos->rfc }}
                                    </strong>
                                    , FACULTADO PARA
                                    ADMINISTRAR EL CUMPLIMIENTO DE
                                    LAS OBLIGACIONES QUE DERIVEN DEL OBJETO DEL PRESENTE CONTRATO, QUIEN PODRÁ SER
                                    SUSTITUIDO EN
                                    CUALQUIER MOMENTO, BASTANDO PARA TALES EFECTOS UN COMUNICADO POR ESCRITO Y FIRMADO
                                    POR EL
                                    SERVIDOR PÚBLICO FACULTADO PARA ELLO, INFORMANDO A <strong>“EL PROVEEDOR”</strong>
                                    PARA LOS
                                    EFECTOS DEL
                                    PRESENTE
                                    CONTRATO.
                                </p>
                            </li>
                            <li>
                                <p>
                                    DE CONFORMIDAD CON LOS ARTÍCULOS 34 Y 37 FRACCIONES I Y XIII DEL REGLAMENTO ÓRGANICO
                                    DE LAS
                                    DELEGACIONES ESTATALES Y REGIONALES DEL INSTITUTO DE SEGURIDAD Y SERVICIOS SOCIALES
                                    DE LOS
                                    TRABAJADORES DEL ESTADO, SUSCRIBE EL PRESENTE INSTRUMENTO LEGAL,
                                    <strong>{{ $empleadomateriales->nombre }}
                                        {{ $empleadomateriales->apellido_paterno }}
                                        {{ $empleadomateriales->apellido_materno }}</strong>,
                                    <strong>{{ $empleadomateriales->Cargos->nombre_cargo }} </strong>
                                    , REGISTRO FEDERAL DE CONTRIBUYENTES <strong>{{ $empleadomateriales->rfc }}
                                    </strong>
                                    FACULTADA PARA REALIZAR LA
                                    CONTRATACIÓN DE LOS SERVICIOS GENERALES Y SUPERVISIÓN DE LOS SERVICIOS REQUERIDOS
                                    POR LAS ÁREAS ADMINISTRATIVAS Y LOS CENTROS DE TRABAJO DELEGACIONALES, CON CARGO A
                                    LAS PARTIDAS PRESUPUESTALES QUE SEAN ADMINISTRADAS EN FORMA DESCONCENTRADA POR LA
                                    DELEGACIÓN, DE CONFORMIDAD CON LOS PROCEDIMIENTOS AUTORIZADOS Y EN APEGO A LA
                                    NORMATIVIDAD APLICABLE, QUIEN PODRA SER SUSTITUIDA EN CUALQUIER MOMENTO, BASTANDO
                                    PARA TALES EFECTOS UN COMUNICADO POR ESCRITO, FIRMADO POR EL SERVIDOR PUBLICO
                                    FACULTADO PARA ELLO, INFORMANDO A “EL PROVEDOR” PARA LOS EFECTOS DEL PRESENTE
                                    CONTRATO.
                                </p>
                            </li>
                            <li>
                                <p>
                                    LA ADJUDICACIÓN DEL PRESENTE CONTRATO SE REALIZÓ MEDIANTE EL PROCEDIMIENTO DE
                                    <strong>
                                        {{ $requisicion->Tipos->nombre_tipo }}
                                    </strong>,
                                    AL AMPARO DE LO ESTABLECIDO EN LOS ARTÍCULOS 134 DE LA CONSTITUCIÓN POLÍTICA DE LOS
                                    ESTADOS UNIDOS MEXICANOS; <strong>ARTÍCULOS 26 FRACCIÓN III, 40 SEGUNDO Y TERCER
                                        PÁRRAFOS;
                                        42 PRIMER
                                        Y TERCER PÁRRAFO DE LA LEY DE ADQUISICIONES, ARRENDAMIENTOS Y SERVICIOS DEL
                                        SECTOR
                                        PÚBLICO.</strong>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>“LA DEPENDENCIA”</strong> CUENTA CON SUFICIENCIA PRESUPUESTARIA OTORGADA
                                    MEDIANTE OFICIO <strong>{{ $contrato->oficio_suficiencia }}</strong>, DE
                                    FECHA DE <strong>{{ $contrato->fecha_oficio_suficiencia }}</strong>, EMITIDO POR LA
                                    <strong>{{ $empleadofinanzas->nombre }} {{ $empleadofinanzas->apellido_paterno }}
                                        {{ $empleadofinanzas->apellido_materno }},
                                        {{ $empleadofinanzas->Cargos->nombre_cargo }}.</strong>
                                </p>
                            </li>

                            @if ($requisicion->pluralidad = 1)
                                <li>
                                    <p>
                                        La SHCP (SECRETARIA DE HACIENDA Y CREDITO PUBLICO) AUTORIZÓ LA PLURIANUALIDAD
                                        MEDIANTE
                                        EL
                                        OFICIO NÚMERO DE OFICIO
                                        <strong>{{ $contrato->oficio_plurianualidad }}.</strong>

                                    </p>
                                    @if ($requisicion->autorizacion_previa = 1)
                                        <p>
                                            EN CASO DE QUE SE TRATE DE UNA CONTRATACIÓN CUYA VIGENCIA INICIE EN EL
                                            EJERCICIO FISCAL SIGUIENTE DE AQUÉL EN QUE SE FORMALICE, SE DEBERÁ CONSIGNAR
                                            EL OFICIO DE AUTORIZACIÓN DE LA SHCP EN TÉRMINOS DE LOS ARTÍCULOS 35 DE LA
                                            LEY FEDERAL DE PRESUPUESTO Y RESPONSABILIDAD HACENDARIA Y 146 DE SU
                                            REGLAMENTO.
                                        </p>
                                    @endif
                                <li>
                            @endif

                            <li>
                                <p>
                                    PARA EFECTOS FISCALES LAS AUTORIDADES HACENDARIAS DE CONFORMIDAD CON LA CONSTANCIA
                                    DE
                                    SITUACIÓN FISCAL GENERADA POR EL SAT (SISTEMA DE ADMINISTRACIÓN TRIBUTARIA) LE HAN
                                    ASIGNADO EL
                                    REGISTRO FEDERAL DE CONTRIBUYENTES: <strong>ISS6001015A3</strong> .
                                </p>

                            </li>

                            <li>
                                <p>
                                    TIENE ESTABLECIDO SU DOMICILIO EN <strong>CALLE AMAPOLAS, NÚMERO 100 COLONIA
                                        REFORMA,
                                        C.P 68050
                                        OAXACA
                                        DE JUÁREZ, OAXACA</strong>, MISMO QUE SEÑALA PARA LOS FINES Y EFECTOS LEGALES
                                    DEL
                                    PRESENTE
                                    CONTRATO.
                                </p>
                            </li>
                            @if ($requisicion->garantia1_id = 2 || ($requisicion->garantia_2_id = 2 || ($requisicion->garantia_3_id = 2)))
                                <li>
                                    <p>
                                        DE LA REVISIÓN AL HISTORIAL DE CUMPLIMIENTO EN MATERIA DE CONTRATACIONES EN EL
                                        REGISTRO ÚNICO DE CONTRATISTAS, SE ADVIERTE QUE <strong>“EL PROVEEDOR”</strong>
                                        CUENTA CON UN GRADO DE CUMPLIMIENTO <strong>, POR LO QUE
                                            <strong>“LA
                                                DEPENDENCIA”</strong> DETERMINA PROCEDENTE EFECTUAR LA REDUCCIÓN DEL
                                            MONTO DE LA GARANTÍA POR UN PORCENTAJE DE {{ $contrato->reducción }}.
                                    </p>
                                </li>
                            @else
                            @endif

                        </ol>
                    </li>
                    <li>
                        @if ($contrato->Proveedor->persona_id = 2)
                            <p>
                                “EL PROVEEDOR”, por conducto de su representante declara que:
                            </p>
                        @else
                            <p>
                                “EL PROVEEDOR” declara que:
                            </p>
                        @endif
                        <ol>
                            @if ($contrato->Proveedor->persona_id = 2)
                                <li>
                                    <p>
                                        ES UNA PERSONA MORAL LEGALMENTE CONSTITUIDA DE CONFORMIDAD CON LA LEGISLACIÓN
                                        MEXICANA, SEGÚN CONSTA EN EL TESTIMONIO QUE CONTIENE
                                        {{ $contrato->Proveedor->instrumento_publico }}, CON EL FOLIO
                                        {{ $contrato->Proveedor->fiolio_registro }}, DE FECHA
                                        {{ $contrato->Proveedor->fecha_registro }}, PASADA ANTE LA FE DEL
                                        {{ $contrato->Proveedor->registro_publico }}.

                                    </p>
                                </li>
                            @else
                                <li>
                                    <p>
                                        ES UNA PERSONA FÍSICA, DE NACIONALIDAD
                                        <strong>{{ $contrato->nacionalidad }}</strong> LO QUE ACREDITA CON
                                        {{ $contrato->documento_expedicion }}, EXPEDIDA POR
                                        {{ $contrato->instutucion_expedida }}.
                                    </p>
                                </li>
                            @endif

                            <li>
                                REÚNE LAS CONDICIONES TÉCNICAS, JURÍDICAS Y ECONÓMICAS, Y CUENTA CON LA ORGANIZACIÓN Y
                                ELEMENTOS
                                NECESARIOS PARA SU CUMPLIMIENTO.
                            </li>
                            <li>
                                CUENTA CON SU REGISTRO FEDERAL DE CONTRIBUYENTES
                                <strong>
                                    {{ $contrato->Proveedor->rfc }}
                                </strong>
                            </li>
                            <li>
                                BAJO PROTESTA DE DECIR VERDAD, ESTÁ AL CORRIENTE EN LOS PAGOS DE SUS OBLIGACIONES
                                FISCALES, EN
                                ESPECÍFICO LAS PREVISTAS EN EL ARTÍCULO 32-D DEL CÓDIGO FISCAL FEDERAL VIGENTE, ASÍ COMO
                                DE SUS
                                OBLIGACIONES FISCALES EN MATERIA DE SEGURIDAD SOCIAL, ANTE INSTITUTO DEL FONDO NACIONAL
                                DE LA
                                VIVIENDA PARA LOS TRABAJADORES (INFONAVIT) Y INSTITUTO MEXICANO DEL SEGURO SOCIAL
                                (IMSS); LO QUE
                                ACREDITA CON LAS OPINIONES DE CUMPLIMIENTO DE OBLIGACIONES FISCALES Y EN MATERIA DE
                                SEGURIDAD
                                SOCIAL EN SENTIDO POSITIVO, EMITIDAS POR EL SAT E IMSS, RESPECTIVAMENTE, ASÍ COMO CON LA
                                CONSTANCIA DE SITUACIÓN FISCAL EN MATERIA DE APORTACIONES PATRONALES Y ENTERO DE
                                DESCUENTOS, SIN
                                ADEUDO, EMITIDA POR EL INFONAVIT, LAS CUALES SE ENCUENTRAN VIGENTES Y OBRAN EN EL
                                EXPEDIENTE
                                RESPECTIVO.
                            </li>
                            <li>
                                TIENE ESTABLECIDO SU DOMICILIO EN
                                <strong>{{ $contrato->Proveedor->domicilio }}</strong> MISMO QUE
                                SEÑALA PARA LOS FINES Y EFECTOS LEGALES DEL PRESENTE CONTRATO.
                            </li>
                        </ol>
                    </li>
                    <li><strong>De “LAS PARTES”:</strong>
                        <ol class="decimal">
                            <li>
                                QUE ES SU VOLUNTAD CELEBRAR EL PRESENTE CONTRATO Y SUJETARSE A SUS TÉRMINOS Y
                                CONDICIONES, PARA
                                LO CUAL SE RECONOCEN LAS FACULTADES Y CAPACIDADES, MISMAS QUE NO LES HAN SIDO REVOCADAS
                                O
                                LIMITADAS EN FORMA ALGUNA, POR LO QUE DE COMÚN ACUERDO SE OBLIGAN DE CONFORMIDAD CON LAS
                                SIGUIENTES:
                            </li>
                        </ol>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <h5>
                <strong>CLÁUSULAS</strong>
            </h5>
        </div>
        <div class="row">
            <h6>
                <p>
                    PRIMERA. OBJETO DEL CONTRATO.
                </p>
            </h6>
            <p>
                <strong>“EL PROVEEDOR”</strong> ACEPTA Y SE OBLIGA A PROPORCIONAR A <strong>“LA DEPENDENCIA”</strong> LA
                PRESTACIÓN DEL SERVICIO DE
                <strong>{{ $contrato->descripcion_contrato }}</strong>, @if ($requisicion->tipo_id = 1)
                    EN LOS TÉRMINOS Y CONDICIONES ESTABLECIDOS
                @else
                    EN LOS TÉRMINOS Y CONDICIONES ESTABLECIDOS EN LA CONVOCATORIA
                @endif, ESTE CONTRATO Y SUS ANEXOS QUE FORMAN PARTE INTEGRANTE DEL MISMO.
            </p>
            <h6>
                <p>
                    SEGUNDA. MONTO DEL CONTRATO
                </p>
            </h6>
            <p>
                @if ($requisicion->tipo_id = 1 && ($requisicion->pluralidad = 0))
                    “LA DEPENDENCIA” PAGARÁ A “EL PROVEEDOR” COMO CONTRAPRESTACIÓN POR LOS SERVICIOS OBJETO DE ESTE
                    CONTRATO, LA CANTIDAD DE <strong>$ {{ $requisicion->total }}, IVA
                        INCLUIDO</strong>, MENOS LAS RETENCIONES QUE CONFORME A LA LEY PROCEDAN.
                @else
                    “LA DEPENDENCIA” PAGARÁ A “EL PROVEEDOR” COMO CONTRAPRESTACIÓN POR LOS SERVICIOS OBJETO DE ESTE
                    CONTRATO, LA CANTIDAD DE <strong>$ {{ $requisicion->total }}, IVA
                        INCLUIDO</strong>, IMPORTE QUE SE CUBRIRÁ EN CADA UNO DE LOS EJERCICIOS FISCALES, DE ACUERDO A
                    LO SIGUIENTE:
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Ejercicio Fiscal</th>
                                <th scope="col">Monto sin impuestos</th>
                                <th scope="col">Monto con impuestos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>(INCORPORAR EJERCICIO FISCAL)</th>
                                <td>(MONTO SIN IMPUESTOS DEL EJERCICIO)</td>
                                <td>(MONTO CON IMPUESTOS DEL EJERCICIO) </td>
                            </tr>
                            <tr>
                                <th>Se agregarán tantos se hayan programado</th>
                                <td><input type="text" class="form-control"></td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <th scope="row">Total</th>
                                <td>$(MONTO TOTAL SIN IMPUESTOS)</td>
                                <td>(MONTO TOTAL con impuestos)</td>
                            </tr>
                        </tbody>
                    </table>
                @endif
            <p>
                LOS PRECIO UNITARIO DEL PRESENTE CONTRATO, EXPRESADO EN MONEDA NACIONAL SON:
            </p>
            <table>
                <thead>
                    <tr>
                        <th class="col-1">No. de partida</th>
                        <th class="col-1">CUCOP</th>
                        <th class="col-5">Descripción</th>
                        <th class="col-1">Cantidad solicitada</th>
                        <th class="col-1">Unidad de medida</th>
                        <th class="col-1">Precio unitario</th>
                        <th class="col-2">Importe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requisicion->detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->num_partida }}</td>
                            <td>{{ $detalle->cucop }}</td>
                            <td>{{ $detalle->Insumos->descripcion }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ $detalle->Medidas->nombre_medida }}</td>
                            <td>{{ '$' . $detalle->precio }}</td>
                            <td>{{ '$' . $detalle->importe }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <p>
                EL PRECIO UNITARIO ES CONSIDERADO FIJO Y EN MONEDA NACIONAL HASTA QUE CONCLUYA LA RELACIÓN
                CONTRACTUAL QUE SE FORMALIZA, INCLUYENDO TODOS LOS CONCEPTOS Y COSTOS INVOLUCRADOS EN LA
                PRESTACIÓN DEL SERVICIO, POR LO QUE “EL PROVEEDOR” NO PODRÁ AGREGAR NINGÚN COSTO EXTRA Y LOS
                PRECIOS SERÁN INALTERABLES DURANTE LA VIGENCIA DEL PRESENTE CONTRATO.
            </p>
            @if ($requisicion->tipo_id = 1 || ($requisicion->tipo_id = 3 && ($requisicion->pluralidad = 0)))
                <p>
                    “LA DEPENDENCIA” PAGARÁ A “EL PROVEEDOR” COMO CONTRAPRESTACIÓN POR LOS SERVICIOS OBJETO DE ESTE
                    CONTRATO, LA CANTIDAD DE <strong>$ {{ $requisicion->total }}, IVA
                        INCLUIDO</strong>, MENOS LAS RETENCIONES QUE CONFORME A LA LEY PROCEDAN.
                </p>
            @else
                <p>
                    <strong>“LA DEPENDENCIA”</strong> CONVIENE CON <strong>“EL ARRENDADOR”</strong> QUE EL MONTO MÍNIMO
                    DEL ARRENDAMIENTO OBJETO DEL
                    PRESENTE CONTRATO PARA LOS EJERCICIOS FISCALES DE (CONCATENAR EJERCICIOS FISCALES QUE INVOLUCRAN LA
                    PLURIANUALIDAD) ES POR LA CANTIDAD DE <strong>$ {{ $requisicion->total }}, IVA
                        INCLUIDO</strong>, MENOS LAS RETENCIONES QUE CONFORME A LA LEY PROCEDAN.
                </p>
                <p>
                    IMPORTE MÍNIMOS Y MÁXIMOS A PAGAR EN CADA EJERCICIO FISCAL DE ACUERDO A LO SIGUIENTE: </p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ejercicio Fiscal</th>
                            <th scope="col">Monto sin impuestos</th>
                            <th scope="col">Monto con impuestos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>(INCORPORAR EJERCICIO FISCAL)</th>
                            <td>(MONTO SIN IMPUESTOS DEL EJERCICIO)</td>
                            <td>(MONTO CON IMPUESTOS DEL EJERCICIO) </td>
                        </tr>
                        <tr>
                            <th>Se agregarán tantos se hayan programado</th>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                        </tr>
                        <tr>
                            <th scope="row">Total</th>
                            <td>$(MONTO TOTAL SIN IMPUESTOS)</td>
                            <td>(MONTO TOTAL con impuestos)</td>
                        </tr>
                    </tbody>
                </table>
                <p>
                    LAS PARTES CONVIENEN EXPRESAMENTE QUE LAS OBLIGACIONES DE ESTE CONTRATO, CUYO CUMPLIMIENTO SE
                    ENCUENTRA PREVISTO REALIZAR DURANTE LOS EJERCICIOS FISCALES QUEDARÁN SUJETAS PARA FINES DE SU
                    EJECUCIÓN Y PAGO A LA DISPONIBILIDAD
                    PRESUPUESTARIA, CON QUE CUENTE “LA DEPENDENCIA O ENTIDAD”, CONFORME AL PRESUPUESTO DE EGRESOS DE LA
                    FEDERACIÓN QUE PARA EL EJERCICIO FISCAL CORRESPONDIENTE APRUEBE LA CÁMARA DE DIPUTADOS DEL H.
                    CONGRESO DE LA UNIÓN, SIN QUE LA NO REALIZACIÓN DE LA REFERIDA CONDICIÓN SUSPENSIVA ORIGINE
                    RESPONSABILIDAD PARA ALGUNA DE LAS PARTES.
                </p>
                <p>
                    LOS PRECIO UNITARIO DEL PRESENTE CONTRATO, EXPRESADO EN MONEDA NACIONAL SON:
                </p>
                <table>
                    <thead>
                        <tr>
                            <th class="col-1">No. de partida</th>
                            <th class="col-1">CUCOP</th>
                            <th class="col-5">Descripción</th>
                            <th class="col-1">Cantidad solicitada</th>
                            <th class="col-1">Unidad de medida</th>
                            <th class="col-1">Precio unitario</th>
                            <th class="col-2">Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requisicion->detalles as $detalle)
                            <tr>
                                <td>{{ $detalle->num_partida }}</td>
                                <td>{{ $detalle->cucop }}</td>
                                <td>{{ $detalle->Insumos->descripcion }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                                <td>{{ $detalle->Medidas->nombre_medida }}</td>
                                <td>{{ '$' . $detalle->precio }}</td>
                                <td>{{ '$' . $detalle->importe }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <p>
                    EL PRECIO UNITARIO ES CONSIDERADO FIJO Y EN MONEDA NACIONAL HASTA QUE CONCLUYA LA RELACIÓN
                    CONTRACTUAL QUE SE FORMALIZA, INCLUYENDO TODOS LOS CONCEPTOS Y COSTOS INVOLUCRADOS EN LA
                    PRESTACIÓN DEL SERVICIO, POR LO QUE “EL PROVEEDOR” NO PODRÁ AGREGAR NINGÚN COSTO EXTRA Y LOS
                    PRECIOS SERÁN INALTERABLES DURANTE LA VIGENCIA DEL PRESENTE CONTRATO.
                </p>
            @endif
            <h6>
                <p>
                    TERCERA. ANTICIPO
                </p>
            </h6>
            @if ($requisicion->aticipos = 1)
                <p>
                    SE OTORGARÁN A “EL PROVEEDOR”, UN ANTICIPO SOBRE EL MONTO TOTAL DEL
                    CONTRATO.
                </p>
            @else
                <p>
                    PARA EL PRESENTE CONTRATO “LA ENTIDAD” NO OTORGARÁ ANTICIPO A “EL PROVEEDOR”
                </p>
            @endif
            <h6>
                <p>
                    CUARTA. FORMA Y LUGAR DE PAGO
                </p>
            </h6>
            <p>
                <strong>“LA DEPENDENCIA” </strong>EFECTUARÁ EL PAGO A TRAVÉS DE TRANSFERENCIA ELECTRÓNICA EN PESOS DE
                LOS ESTADOS UNIDOS MEXICANOS, A MES VENCIDO (OTRA TEMPORALIDAD O CALENDARIO ESTABLECIDO) O PORCENTAJE DE
                AVANCE (PAGOS PROGRESIVOS), CONFORME A LOS SERVICIOS EFECTIVAMENTE PRESTADOS Y A ENTERA SATISFACCIÓN DEL
                ADMINISTRADOR DEL CONTRATO Y DE ACUERDO CON LO ESTABLECIDO.

            </p>
            <p>
                EL PAGO SE REALIZARÁ EN UN PLAZO MÁXIMO DE 20 (VEINTE) DÍAS NATURALES SIGUIENTES, CONTADOS A PARTIR DE
                LA FECHA EN QUE SEA ENTREGADO Y ACEPTADO EL COMPROBANTE FISCAL DIGITAL POR INTERNET (CFDI) O FACTURA
                ELECTRÓNICA A <strong>“LA DEPENDENCIA”</strong>, CON LA APROBACIÓN (FIRMA) DEL ADMINISTRADOR DEL
                PRESENTE CONTRATO.

            <p>
                EL CÓMPUTO DEL PLAZO PARA REALIZAR EL PAGO SE CONTABILIZARÁ A PARTIR DEL DÍA HÁBIL SIGUIENTE DE LA
                ACEPTACIÓN DEL CFDI O FACTURA ELECTRÓNICA, Y ÉSTA REÚNA LOS REQUISITOS FISCALES QUE ESTABLECE LA
                LEGISLACIÓN EN LA MATERIA, EL DESGLOSE DE LOS SERVICIOS PRESTADOS, LOS PRECIOS UNITARIOS, SE
                VERIFIQUE
                SU AUTENTICIDAD, NO EXISTAN ACLARACIONES AL IMPORTE Y VAYA ACOMPAÑADA CON LA DOCUMENTACIÓN SOPORTE
                DE LA
                PRESTACIÓN DE LOS SERVICIOS FACTURADOS.
            </p>
            <p>
                DE CONFORMIDAD CON EL ARTÍCULO 90, DEL REGLAMENTO DE LA “LAASSP”, EN CASO DE QUE EL CFDI O FACTURA
                ELECTRÓNICA ENTREGADO PRESENTE ERRORES, EL ADMINISTRADOR DEL PRESENTE CONTRATO O A QUIEN ÉSTE
                DESIGNE
                POR ESCRITO, DENTRO DE LOS 3 (TRES) DÍAS HÁBILES SIGUIENTES DE SU RECEPCIÓN, INDICARÁ A “EL
                PROVEEDOR”
                LAS DEFICIENCIAS QUE DEBERÁ CORREGIR; POR LO QUE, EL PROCEDIMIENTO DE PAGO REINICIARÁ EN EL MOMENTO
                EN
                QUE “EL PROVEEDOR” PRESENTE EL CFDI Y/O DOCUMENTOS SOPORTE CORREGIDOS Y SEAN ACEPTADOS.
            </p>
            <p>
                EL TIEMPO QUE “EL PROVEEDOR” UTILICE PARA LA CORRECCIÓN DEL CFDI Y/O DOCUMENTACIÓN SOPORTE
                ENTREGADA, NO SE COMPUTARÁ PARA EFECTOS DE PAGO, DE ACUERDO CON LO ESTABLECIDO EN EL ARTÍCULO 51 DE
                LA “LAASSP”.
            </p>
            <p>
                EL CFDI O FACTURA ELECTRÓNICA DEBERÁ SER PRESENTADA DE MANERA FISICA EN LA SUBDELEGACION DE
                ADMINISTRACION Y ENVIADA AL CORREO fer.ramirez@issste.gob.mx EL CFDI O FACTURA ELECTRÓNICA SE DEBERÁ
                PRESENTAR DESGLOSANDO EL IMPUESTO CUANDO APLIQUE.
            </p>
            <p>
                “EL PROVEEDOR” MANIFIESTA SU CONFORMIDAD QUE, HASTA EN TANTO NO SE CUMPLA CON LA VERIFICACIÓN,
                SUPERVISIÓN Y ACEPTACIÓN DE LA PRESTACIÓN DE LOS SERVICIOS, NO SE TENDRÁN COMO RECIBIDOS O ACEPTADOS
                POR EL ADMINISTRADOR DEL PRESENTE CONTRATO.
            </p>
            <p>
                PARA EFECTOS DE TRÁMITE DE PAGO, “EL PROVEEDOR” DEBERÁ SER TITULAR DE UNA CUENTA BANCARIA, EN LA QUE SE
                EFECTUARÁ LA TRANSFERENCIA ELECTRÓNICA DE PAGO, RESPECTO DE LA CUAL DEBERÁ PROPORCIONAR TODA LA
                INFORMACIÓN Y DOCUMENTACIÓN QUE LE SEA REQUERIDA POR “LA DEPENDENCIA O ENTIDAD”, PARA EFECTOS DEL PAGO.
            </p>
            <p>
                “EL PROVEEDOR” DEBERÁ PRESENTAR LA INFORMACIÓN Y DOCUMENTACIÓN “LA DEPENDENCIA O ENTIDAD” LE SOLICITE
                PARA EL TRÁMITE DE PAGO, ATENDIENDO A LAS DISPOSICIONES LEGALES E INTERNAS DE “LA DEPENDENCIA O
                ENTIDAD”.
            </p>
            <p>
                EL PAGO DE LA PRESTACIÓN DE LOS SERVICIOS RECIBIDOS, QUEDARÁ CONDICIONADO AL PAGO QUE “EL PROVEEDOR”
                DEBA EFECTUAR POR CONCEPTO DE PENAS CONVENCIONALES Y, EN SU CASO, DEDUCTIVAS.
            </p>

            <h6>
                QUINTA. LUGAR, PLAZOS Y CONDICIONES DE LA PRESTACIÓN DE LOS SERVICIOS.
            </h6>

            <p>
                A PRESTACIÓN DE LOS SERVICIOS, SE REALIZARÁ CONFORME A LOS PLAZOS, CONDICIONES Y ENTREGABLES
                ESTABLECIDOS POR “LA ENTIDAD”.
            </p>
            <p>
                LOS SERVICIOS SERÁN PRESTADOS EN LOS DOMICILIOS SEÑALADOS EN EL Y FECHAS ESTABLECIDAS EN EL MISMO;
            </p>
            <p>
                EN LOS CASOS QUE DERIVADO DE LA VERIFICACIÓN SE DETECTEN DEFECTOS O DISCREPANCIAS EN LA PRESTACIÓN DEL
                SERVICIO O INCUMPLIMIENTO EN LAS ESPECIFICACIONES TÉCNICAS, “EL PROVEEDOR” CONTARÁ CON UN PLAZO DE 5
                DIAS NATURALES PARA LA REPOSICIÓN O CORRECCIÓN, CONTADOS A PARTIR DEL MOMENTO DE LA NOTIFICACIÓN POR
                CORREO ELECTRÓNICO Y/O ESCRITO, SIN COSTO ADICIONAL PARA “LA ENTIDAD”.
            </p>
            <h6>
                SEXTA. VIGENCIA
            </h6>
            <p>
                “LAS PARTES” convienen en que la vigencia del presente contrato será del
                {{ $contrato->vigencia_contrato }}.
            </p>
            <h6>
                SÉPTIMA. MODIFICACIONES DEL CONTRATO.
            </h6>
            <p>
                “LAS PARTES” ESTÁN DE ACUERDO QUE “LA DEPENDENCIA O ENTIDAD” POR RAZONES FUNDADAS Y EXPLÍCITAS PODRÁ
                AMPLIAR EL MONTO O LA CANTIDAD DE LOS SERVICIOS, DE CONFORMIDAD CON EL ARTÍCULO 52 DE LA “LAASSP”,
                SIEMPRE Y CUANDO LAS MODIFICACIONES NO REBASEN EN SU CONJUNTO EL 20% (VEINTE POR CIENTO) DE LOS
                ESTABLECIDOS ORIGINALMENTE, EL PRECIO UNITARIO SEA IGUAL AL ORIGINALMENTE PACTADO Y EL CONTRATO ESTÉ
                VIGENTE. LA MODIFICACIÓN SE FORMALIZARÁ MEDIANTE LA CELEBRACIÓN DE UN CONVENIO MODIFICATORIO.
            </p>
            <p>
                “LA DEPENDENCIA O ENTIDAD”, PODRÁ AMPLIAR LA VIGENCIA DEL PRESENTE INSTRUMENTO, SIEMPRE Y CUANDO, NO
                IMPLIQUE INCREMENTO DEL MONTO CONTRATADO O DE LA CANTIDAD DEL SERVICIO, SIENDO NECESARIO QUE SE OBTENGA
                EL PREVIO CONSENTIMIENTO DE “EL PROVEEDOR”.
            </p>
            <p>
                DE PRESENTARSE CASO FORTUITO O FUERZA MAYOR, O POR CAUSAS ATRIBUIBLES A “LA DEPENDENCIA O ENTIDAD”, SE
                PODRÁ MODIFICAR EL PLAZO DEL PRESENTE INSTRUMENTO JURÍDICO, DEBIENDO ACREDITAR DICHOS SUPUESTOS CON LAS
                CONSTANCIAS RESPECTIVAS. LA MODIFICACIÓN DEL PLAZO POR CASO FORTUITO O FUERZA MAYOR PODRÁ SER SOLICITADA
                POR CUALQUIERA DE “LAS PARTES”.
            </p>
            <p>
                EN LOS SUPUESTOS PREVISTOS EN LOS DOS PÁRRAFOS ANTERIORES, NO PROCEDERÁ LA APLICACIÓN DE PENAS
                CONVENCIONALES POR ATRASO.
            </p>
            <p>
                CUALQUIER MODIFICACIÓN AL PRESENTE CONTRATO DEBERÁ FORMALIZARSE POR ESCRITO, Y DEBERÁ SUSCRIBIRSE POR EL
                SERVIDOR PÚBLICO DE “LA DEPENDENCIA O ENTIDAD” QUE LO HAYA HECHO, O QUIEN LO SUSTITUYA O ESTÉ FACULTADO
                PARA ELLO, PARA LO CUAL “EL PROVEEDOR” REALIZARÁ EL AJUSTE RESPECTIVO DE LA GARANTÍA DE CUMPLIMIENTO, EN
                TÉRMINOS DEL ARTÍCULO 91, ÚLTIMO PÁRRAFO DEL REGLAMENTO DE LA LAASSP, SALVO QUE POR DISPOSICIÓN LEGAL SE
                ENCUENTRE EXCEPTUADO DE PRESENTAR GARANTÍA DE CUMPLIMIENTO.
            </p>
            <p>
                “LA DEPENDENCIA O ENTIDAD” SE ABSTENDRÁ DE HACER MODIFICACIONES QUE SE REFIERAN A PRECIOS, ANTICIPOS,
                PAGOS PROGRESIVOS, ESPECIFICACIONES Y, EN GENERAL, CUALQUIER CAMBIO QUE IMPLIQUE OTORGAR CONDICIONES MÁS
                VENTAJOSAS A UN PROVEEDOR COMPARADAS CON LAS ESTABLECIDAS ORIGINALMENTE.
            </p>
            <h6>
                OCTAVA. GARANTÍA DE LOS SERVICIOS
            </h6>
            @if ($requisicion->garantia1_id = 2 || ($requisicion->garantia_2_id = 2 || ($requisicion->garantia_3_id = 2)))
                <p>
                    “EL PROVEEDOR” SE OBLIGA CON “LA DEPENDENCIA” A ENTREGAR AL INICIO DE LA PRESTACIÓN DEL SERVICIO,
                    UNA GARANTÍA POR LA CALIDAD DE LOS SERVICIOS PRESTADOS, POR {{ $requisicion->meses }} MESES, LA
                    CUAL SE CONSTITUIRÁ GARANTÍA SOBRE LA CALIDAD DE LOS SERVICIOS, PUDIENDO SER MEDIANTE LA PÓLIZA DE
                    GARANTÍA, EN TÉRMINOS DE LOS ARTÍCULOS 77 Y 78 DE LA LEY FEDERAL DE PROTECCIÓN AL CONSUMIDOR.
                </p>
            @else
                <p>
                    PARA LA PRESTACIÓN DE LOS SERVICIOS MATERIA DEL PRESENTE CONTRATO, REQUIERE QUE “EL PROVEEDOR”
                    PRESENTE UNA CARTA GARANTÍA POR LA CALIDAD DE LOS SERVICIOS CONTRATADOS.
                </p>
            @endif

            <h6>
                NOVENA. GARANTÍA
            </h6>
            @if ($requisicion->aticipos = 1)
                <p>
                    “EL PROVEEDOR” ENTREGARÁ A “LA DEPENDENCIA”, PREVIAMENTE A LA ENTREGA DEL ANTICIPO UNA
                    GARANTÍA CONSTITUIDA POR LA TOTALIDAD DEL MONTO DEL ANTICIPO RECIBIDO.
                </p>
                <p>
                    EL OTORGAMIENTO DE ANTICIPO, DEBERÁ GARANTIZARSE EN LOS TÉRMINOS DE LOS ARTÍCULOS 48, DE LA
                    “LAASSP”; 81, PÁRRAFO PRIMERO Y FRACCIÓN V, DE SU REGLAMENTO.
                </p>
                <p>
                    SI LAS DISPOSICIONES JURÍDICAS APLICABLES LO PERMITEN, LA ENTREGA DE LA GARANTÍA DE ANTICIPO PODRÁ
                    REALIZARSE DE MANERA ELECTRÓNICA.
                </p>
                <p>
                    UNA VEZ AMORTIZADO EL CIEN POR CIENTO DEL ANTICIPO, EL SERVIDOR PÚBLICO FACULTADO POR “LA
                    DEPENDENCIA O ENTIDAD” PROCEDERÁ INMEDIATAMENTE A EXTENDER LA CONSTANCIA DE CUMPLIMIENTO DE DICHA
                    OBLIGACIÓN CONTRACTUAL Y DARÁ INICIO A LOS TRÁMITES PARA LA CANCELACIÓN DE LA GARANTÍA, LO QUE
                    COMUNICARÁ A “EL PROVEEDOR”.
                </p>
            @else
            @endif

            <strong>B) CUMPLIMIENTO DEL CONTRATO.</strong>
            <p>
                CONFORME A LOS ARTÍCULOS 48, FRACCIÓN II, 49, FRACCIÓN I , DE LA
                “LAASSP”; 85, FRACCIÓN III, Y 103 DE SU REGLAMENTO “EL PROVEEDOR” SE OBLIGA A CONSTITUIR UNA GARANTÍA
                INDIVISIBLE POR EL CUMPLIMIENTO FIEL Y EXACTO DE TODAS LAS OBLIGACIONES
                DERIVADAS DE ESTE CONTRATO; DIVISIBLE Y EN ESTE CASO SE HARÁ EFECTIVA EN
                PROPORCIÓN AL INCUMPLIMIENTO DE LA OBLIGACIÓN PRINCIPAL, MEDIANTE FIANZA EXPEDIDA POR COMPAÑÍA
                AFIANZADORA MEXICANA AUTORIZADA POR LA COMISIÓN NACIONAL DE SEGUROS Y DE FIANZAS, A FAVOR, POR UN
                IMPORTE EQUIVALENTE AL {{ $requisicion->porcentaje_1 }} DEL MONTO TOTAL DEL CONTRATO, SIN INCLUIR EL
                IVA.

            </p>
            <p>
                DICHA FIANZA DEBERÁ SER ENTREGADA A “LA DEPENDENCIA O ENTIDAD”, A MÁS TARDAR DENTRO DE LOS 10 DÍAS
                NATURALES POSTERIORES A LA FIRMA DEL PRESENTE CONTRATO.
            </p>
            <p>
                SI LAS DISPOSICIONES JURÍDICAS APLICABLES LO PERMITEN, LA ENTREGA DE LA GARANTÍA DE CUMPLIMIENTO SE
                PODRÁ REALIZAR DE MANERA ELECTRÓNICA.
            </p>
            <p>
                EN CASO DE QUE “EL PROVEEDOR” INCUMPLA CON LA ENTREGA DE LA GARANTÍA EN EL PLAZO ESTABLECIDO, “LA
                DEPENDENCIA O ENTIDAD” PODRÁ RESCINDIR EL CONTRATO Y DARÁ VISTA AL ÓRGANO INTERNO DE CONTROL PARA QUE
                PROCEDA EN EL ÁMBITO DE SUS FACULTADES.
            </p>
            <p>
                LA GARANTÍA DE CUMPLIMIENTO NO SERÁ CONSIDERADA COMO UNA LIMITANTE DE RESPONSABILIDAD DE “EL PROVEEDOR”,
                DERIVADA DE SUS OBLIGACIONES Y GARANTÍAS ESTIPULADAS EN EL PRESENTE INSTRUMENTO JURÍDICO, Y NO IMPEDIRÁ
                QUE “LA DEPENDENCIA O ENTIDAD” RECLAME LA INDEMNIZACIÓN POR CUALQUIER INCUMPLIMIENTO QUE PUEDA EXCEDER
                EL VALOR DE LA GARANTÍA DE CUMPLIMIENTO.
            </p>
            <p>
                EN CASO DE INCREMENTO AL MONTO DEL PRESENTE INSTRUMENTO JURÍDICO O MODIFICACIÓN AL PLAZO, “EL PROVEEDOR”
                SE OBLIGA A ENTREGAR A “LA DEPENDENCIA O ENTIDAD”, DENTRO DE LOS 10 (DIEZ DÍAS) NATURALES SIGUIENTES A
                LA FORMALIZACIÓN DEL MISMO, DE CONFORMIDAD CON EL ÚLTIMO PÁRRAFO DEL ARTÍCULO 91, DEL REGLAMENTO DE LA
                “LAASSP”, LOS DOCUMENTOS MODIFICATORIOS O ENDOSOS CORRESPONDIENTES, DEBIENDO CONTENER EN EL DOCUMENTO LA
                ESTIPULACIÓN DE QUE SE OTORGA DE MANERA CONJUNTA, SOLIDARIA E INSEPARABLE DE LA GARANTÍA OTORGADA
                INICIALMENTE.
            </p>
            <p>
                CUANDO LA CONTRATACIÓN ABARQUE MÁS DE UN EJERCICIO FISCAL, LA GARANTÍA DE CUMPLIMIENTO DEL CONTRATO,
                PODRÁ SER POR EL PORCENTAJE QUE CORRESPONDA DEL MONTO TOTAL POR EROGAR EN EL EJERCICIO FISCAL DE QUE SE
                TRATE, Y DEBERÁ SER RENOVADA POR “EL PROVEEDOR” CADA EJERCICIO FISCAL POR EL MONTO QUE SE EJERCERÁ EN EL
                MISMO, LA CUAL DEBERÁ PRESENTARSE A “LA DEPENDENCIA O ENTIDAD” A MÁS TARDAR DENTRO DE LOS PRIMEROS DIEZ
                DÍAS NATURALES DEL EJERCICIO FISCAL QUE CORRESPONDA.
            </p>
            <p>
                UNA VEZ CUMPLIDAS LAS OBLIGACIONES A SATISFACCIÓN, EL SERVIDOR PÚBLICO FACULTADO POR “LA DEPENDENCIA O
                ENTIDAD” PROCEDERÁ INMEDIATAMENTE A EXTENDER LA CONSTANCIA DE CUMPLIMIENTO DE LAS OBLIGACIONES
                CONTRACTUALES Y DARÁ INICIO A LOS TRÁMITES PARA LA CANCELACIÓN DE LA GARANTÍA CUMPLIMIENTO DEL CONTRATO,
                LO QUE COMUNICARÁ A “EL PROVEEDOR”.
            </p>
            <strong>C) GARANTÍA PARA RESPONDER POR VICIOS OCULTOS.</strong>
            <p>
                “EL PROVEEDOR” DEBERÁ RESPONDER POR LOS DEFECTOS, VICIOS OCULTOS Y POR LA CALIDAD DE LOS SERVICIOS
                PRESTADOS, ASÍ COMO DE CUALQUIER OTRA RESPONSABILIDAD EN QUE HUBIERE INCURRIDO, EN LOS TÉRMINOS
                SEÑALADOS EN ESTE CONTRATO, CONVENIOS MODIFICATORIOS RESPECTIVOS Y EN LA LEGISLACIÓN APLICABLE, DE
                CONFORMIDAD CON LOS ARTÍCULOS 53, PÁRRAFO SEGUNDO DE LA LEY DE ADQUISICIONES, ARRENDAMIENTOS Y SERVICIOS
                DEL SECTOR PÚBLICO Y 96, PÁRRAFO SEGUNDO DE SU REGLAMENTO.

            </p>
            <p>
                “EL PROVEEDOR”, QUEDARÁ LIBERADO DE SU OBLIGACIÓN, UNA VEZ TRANSCURRIDOS (INCORPORAR NUMERO DE MESES),
                CONTADOS A PARTIR DE LA FECHA EN QUE CONSTE POR ESCRITO LA RECEPCIÓN FÍSICA DE LOS SERVICIOS PRESTADOS,
                SIEMPRE Y CUANDO “LA DEPENDENCIA O ENTIDAD” NO HAYA IDENTIFICADO DEFECTOS O VICIOS OCULTOS EN LA CALIDAD
                DE LOS SERVICIOS PRESTADOS, ASÍ COMO CUALQUIER OTRA RESPONSABILIDAD EN LOS TÉRMINOS DE ESTE CONTRATO Y
                CONVENIOS MODIFICATORIOS RESPECTIVOS.

            </p>
            <h6>DÉCIMA. OBLIGACIONES DE “EL PROVEEDOR”.</h6>
            <h6><strong>“EL PROVEEDOR”, SE OBLIGA A: </strong></h6>
            <ol>
                <li>
                    PRESTAR LOS SERVICIOS EN LAS FECHAS O PLAZOS Y LUGARES ESTABLECIDOS CONFORME A LO PACTADO EN EL
                    PRESENTE CONTRATO Y ANEXOS RESPECTIVOS.
                </li>
                <li>
                    CUMPLIR CON LAS ESPECIFICACIONES TÉCNICAS, DE CALIDAD Y DEMÁS CONDICIONES ESTABLECIDAS EN EL
                    PRESENTE CONTRATO Y SUS RESPECTIVOS ANEXOS.
                </li>
                <li>
                    ASUMIR LA RESPONSABILIDAD DE CUALQUIER DAÑO QUE LLEGUE A OCASIONAR A “LA DEPENDENCIA O ENTIDAD” O A
                    TERCEROS CON MOTIVO DE LA EJECUCIÓN Y CUMPLIMIENTO DEL PRESENTE CONTRATO.
                </li>
                <li>
                    PROPORCIONAR LA INFORMACIÓN QUE LE SEA REQUERIDA POR LA SECRETARÍA DE LA FUNCIÓN PÚBLICA Y EL ÓRGANO
                    INTERNO DE CONTROL, DE CONFORMIDAD CON EL ARTÍCULO 107 DEL REGLAMENTO DE LA “LAASSP”.
                </li>
            </ol>
            <h6><strong>DÉCIMA PRIMERA. OBLIGACIONES DE “LA DEPENDENCIA O ENTIDAD”</strong></h6>
            <h6><strong>“LA DEPENDENCIA O ENTIDAD”, SE OBLIGA A:</strong></h6>
            <ol>
                <li>
                    OTORGAR LAS FACILIDADES NECESARIAS, A EFECTO DE QUE “EL PROVEEDOR” LLEVE A CABO EN LOS TÉRMINOS
                    CONVENIDOS LA PRESTACIÓN DE LOS SERVICIOS OBJETO DEL CONTRATO.
                </li>
                <li>
                    REALIZAR EL PAGO CORRESPONDIENTE EN TIEMPO Y FORMA.
                </li>
                @if ($requisicion->garantia1_id = 2 || ($requisicion->garantia_2_id = 2 || ($requisicion->garantia_3_id = 2)))
                    <li>
                        EXTENDER A “EL PROVEEDOR”, POR CONDUCTO DEL SERVIDOR PÚBLICO FACULTADO, LA CONSTANCIA DE
                        CUMPLIMIENTO DE OBLIGACIONES CONTRACTUALES INMEDIATAMENTE QUE SE CUMPLAN ÉSTAS A SATISFACCIÓN
                        EXPRESA DE DICHO SERVIDOR PÚBLICO PARA QUE SE DÉ TRÁMITE A LA CANCELACIÓN DE LA GARANTÍA DE
                        CUMPLIMIENTO DEL PRESENTE CONTRATO.
                    </li>
                @else
                @endif
            </ol>
            <h6>DÉCIMA SEGUNDA. ADMINISTRACIÓN, VERIFICACIÓN, SUPERVISIÓN Y ACEPTACIÓN DE LOS SERVICIOS</h6>
            <p>
                <strong>“LA DEPENDENCIA"</strong> DESIGNA COMO ADMINISTRADOR DEL PRESENTE CONTRATO A
                <strong>{{ $contrato->AdminContratos->nombre }}
                    {{ $contrato->AdminContratos->apellido_paterno }}
                    {{ $contrato->AdminContratos->apellido_materno }}</strong>, CON RFC
                <strong>{{ $contrato->AdminContratos->rfc }}</strong>,
                <strong>{{ $contrato->AdminContratos->Cargos->nombre_cargo }}</strong>, QUIEN DARÁ SEGUIMIENTO Y
                VERIFICARÁ EL CUMPLIMIENTO DE LOS DERECHOS Y
                OBLIGACIONES ESTABLECIDOS EN ESTE INSTRUMENTO.
            </p>
            <p>
                LOS SERVICIOS SE TENDRÁN POR RECIBIDOS PREVIA REVISIÓN DEL ADMINISTRADOR DEL PRESENTE CONTRATO, LA CUAL
                CONSISTIRÁ EN LA VERIFICACIÓN DEL CUMPLIMIENTO DE LAS ESPECIFICACIONES ESTABLECIDAS Y EN SU CASO EN LOS
                ANEXOS RESPECTIVOS, ASÍ COMO LAS CONTENIDAS EN LA PROPUESTA TÉCNICA.
            </p>
            <p>
                “LA DEPENDENCIA O ENTIDAD”, A TRAVÉS DEL ADMINISTRADOR DEL CONTRATO, RECHAZARÁ LOS SERVICIOS, QUE NO
                CUMPLAN LAS ESPECIFICACIONES ESTABLECIDAS EN ESTE CONTRATO Y EN SUS ANEXOS, OBLIGÁNDOSE “EL PROVEEDOR”
                EN ESTE SUPUESTO A REALIZARLOS NUEVAMENTE BAJO SU RESPONSABILIDAD Y SIN COSTO ADICIONAL PARA “LA
                DEPENDENCIA O ENTIDAD”, SIN PERJUICIO DE LA APLICACIÓN DE LAS PENAS CONVENCIONALES O DEDUCCIONES AL
                COBRO CORRESPONDIENTES.
            </p>
            <p>
                “LA DEPENDENCIA O ENTIDAD”, A TRAVÉS DEL ADMINISTRADOR DEL CONTRATO, PODRÁ ACEPTAR LOS SERVICIOS QUE
                INCUMPLAN DE MANERA PARCIAL O DEFICIENTE LAS ESPECIFICACIONES ESTABLECIDAS EN ESTE CONTRATO Y EN LOS
                ANEXOS RESPECTIVOS, SIN PERJUICIO DE LA APLICACIÓN DE LAS DEDUCCIONES AL PAGO QUE PROCEDAN, Y REPOSICIÓN
                DEL SERVICIO, CUANDO LA NATURALEZA PROPIA DE ÉSTOS LO PERMITA.
            </p>
            <h6>
                DÉCIMA TERCERA. DEDUCCIONES
            </h6>
            <p>
                “LA DEPENDENCIA O ENTIDAD” APLICARÁ DEDUCCIONES AL PAGO POR EL INCUMPLIMIENTO PARCIAL O DEFICIENTE, EN
                QUE INCURRA “EL PROVEEDOR” CONFORME A LO ESTIPULADO EN LAS CLÁUSULAS DEL PRESENTE CONTRATO Y SUS ANEXOS
                RESPECTIVOS, LAS CUALES SE CALCULARÁN POR UN (EN CASO DE EXISTIR SÓLO UN PORCENTAJE, SEÑALAR PORCENTAJE
                DE DEDUCTIVA) % SOBRE EL MONTO DE LOS SERVICIOS, (EN CASO DE ESTABLECER POR DIVERSOS CONCEPTOS
                DEDUCTIVAS REMITIR AL ANEXO CORRESPONDIENTE), PROPORCIONADOS EN FORMA PARCIAL O DEFICIENTE. LAS
                CANTIDADES A DEDUCIR SE APLICARÁN EN EL CFDI O FACTURA ELECTRÓNICA QUE “EL PROVEEDOR” PRESENTE PARA SU
                COBRO, EN EL PAGO QUE SE ENCUENTRE EN TRÁMITE O BIEN EN EL SIGUIENTE PAGO.
            </p>
            <p>
                DE NO EXISTIR PAGOS PENDIENTES, SE REQUERIRÁ A “EL PROVEEDOR” QUE REALICE EL PAGO DE LA DEDUCTIVA A
                TRAVÉS DEL ESQUEMA E5CINCO PAGO ELECTRÓNICO DE DERECHOS, PRODUCTOS Y APROVECHAMIENTOS (DPA´S), A FAVOR
                DE LA TESORERÍA DE LA FEDERACIÓN, O DE LA ENTIDAD. EN CASO DE NEGATIVA SE PROCEDERÁ A HACER EFECTIVA LA
                GARANTÍA DE CUMPLIMIENTO DEL CONTRATO.
            </p>
            <p>
                LAS DEDUCCIONES ECONÓMICAS SE APLICARÁN SOBRE LA CANTIDAD INDICADA SIN INCLUIR IMPUESTOS.
            </p>
            <p>
                LA NOTIFICACIÓN Y CÁLCULO DE LAS DEDUCCIONES CORRESPONDIENTES LAS REALIZARÁ EL ADMINISTRADOR DEL
                CONTRATO DE “LA ENTIDAD”, POR ESCRITO O VÍA CORREO ELECTRÓNICO, DENTRO DE LOS TRES DIAS POSTERIORES AL
                INCUMPLIMIENTO PARCIAL O DEFICIENTE.
            </p>
            <h6>
                DÉCIMA CUARTA. PENAS CONVENCIONALES
            </h6>
            <p>
                EN CASO QUE “EL PROVEEDOR” INCURRA EN ATRASO EN EL CUMPLIMIENTO CONFORME A LO PACTADO PARA LA PRESTACIÓN
                DE LOS SERVICIOS, OBJETO DEL PRESENTE CONTRATO, CONFORME A LO ESTABLECIDO EN EL ANEXO (NO.___) PARTE
                INTEGRAL DEL PRESENTE CONTRATO, “LA DEPENDENCIA O ENTIDAD” POR CONDUCTO DEL ADMINISTRADOR DEL CONTRATO
                APLICARÁ LA PENA CONVENCIONAL EQUIVALENTE AL (INCORPORAR PORCENTAJE DE PENA CONVENCIONAL)%, (EN CASO DE
                EXISTIR SÓLO UN PORCENTAJE O ESTABLECER DIVERSOS PORCENTAJES REMITIR AL ANEXO CORRESPONDIENTE) POR CADA
                (CALCULAR PERIODICIDAD DE PENA) DE ATRASO SOBRE LA PARTE DE LOS SERVICIOS NO PRESTADOS, DE CONFORMIDAD
                CON ESTE INSTRUMENTO LEGAL Y SUS RESPECTIVOS ANEXOS.
            </p>
            <p>
                EL ADMINISTRADOR DETERMINARÁ EL CÁLCULO DE LA PENA CONVENCIONAL, CUYA NOTIFICACIÓN SE REALIZARÁ POR
                ESCRITO O VÍA CORREO ELECTRÓNICO, DENTRO DE LOS _(DÍAS)_____ POSTERIORES AL ATRASO EN EL CUMPLIMIENTO DE
                LA OBLIGACIÓN DE QUE SE TRATE.
            </p>
            <p>
                EL PAGO DE LOS SERVICIOS QUEDARÁ CONDICIONADO, PROPORCIONALMENTE, AL PAGO QUE “EL PROVEEDOR” DEBA
                EFECTUAR POR CONCEPTO DE PENAS CONVENCIONALES POR ATRASO; EN EL SUPUESTO QUE EL CONTRATO SEA RESCINDIDO
                EN TÉRMINOS DE LO PREVISTO EN LA CLÁUSULA VIGÉSIMA CUARTA DE RESCISIÓN, NO PROCEDERÁ EL COBRO DE DICHAS
                PENAS NI LA CONTABILIZACIÓN DE LAS MISMAS AL HACER EFECTIVA LA GARANTÍA DE CUMPLIMIENTO DEL CONTRATO.
            </p>
            <p>
                EL PAGO DE LA PENA PODRÁ EFECTUARSE A TRAVÉS DEL ESQUEMA E5CINCO PAGO ELECTRÓNICO DE DERECHOS, PRODUCTOS
                Y APROVECHAMIENTOS (DPA´S), A FAVOR DE LA TESORERÍA DE LA FEDERACIÓN, O LA ENTIDAD; O BIEN, A TRAVÉS DE
                UN COMPROBANTE DE EGRESO (CFDI DE EGRESO) CONOCIDO COMÚNMENTE COMO NOTA DE CRÉDITO, EN EL MOMENTO EN EL
                QUE EMITA EL COMPROBANTE DE INGRESO (FACTURA O CFDI DE INGRESO) POR CONCEPTO DE LOS SERVICIOS, EN
                TÉRMINOS DE LAS DISPOSICIONES JURÍDICAS APLICABLES.
            </p>
            <p>
                EL IMPORTE DE LA PENA CONVENCIONAL, NO PODRÁ EXCEDER EL EQUIVALENTE AL MONTO TOTAL DE LA GARANTÍA DE
                CUMPLIMIENTO DEL CONTRATO, Y EN EL CASO DE NO HABERSE REQUERIDO ESTA GARANTÍA, NO DEBERÁ EXCEDER DEL 20%
                (VEINTE POR CIENTO) DEL MONTO TOTAL DEL CONTRATO.
            </p>
            <p>
                CUANDO “EL PROVEEDOR” QUEDE EXCEPTUADO DE LA PRESENTACIÓN DE LA GARANTÍA DE CUMPLIMIENTO, EN LOS
                SUPUESTOS PREVISTO EN LA “LAASSP”, EL MONTO MÁXIMO DE LAS PENAS CONVENCIONALES POR ATRASO QUE SE PUEDE
                APLICAR, SERÁ DEL 20% (VEINTE POR CIENTO) DEL MONTO DE LOS SERVICIOS PRESTADOS FUERA DE LA FECHA
                CONVENIDA, DE CONFORMIDAD CON LO ESTABLECIDO EN EL TERCER PÁRRAFO DEL ARTÍCULO 96 DEL REGLAMENTO DE LA
                LEY DE ADQUISICIONES, ARRENDAMIENTOS Y SERVICIOS DEL SECTOR PÚBLICO.
            </p>
            <h6>
                DÉCIMA QUINTA. LICENCIAS, AUTORIZACIONES Y PERMISOS
            </h6>
            <p>
                “EL PROVEEDOR” SE OBLIGA A OBSERVAR Y MANTENER VIGENTES LAS LICENCIAS, AUTORIZACIONES, PERMISOS O
                REGISTROS REQUERIDOS PARA EL CUMPLIMIENTO DE SUS OBLIGACIONES.
            </p>7
            <h6>
                DÉCIMA SEXTA. PÓLIZA DE RESPONSABILIDAD CIVIL
            </h6>
            @if (1 > 1)
                <p>
                    PARA LA PRESTACIÓN DE LOS SERVICIOS MATERIA DEL PRESENTE CONTRATO, NO SE REQUIERE QUE “EL PROVEEDOR”
                    CONTRATE UNA PÓLIZA DE SEGURO POR RESPONSABILIDAD CIVIL.
                </p>
            @else
                <p>
                    “EL PROVEEDOR” SE OBLIGA A CONTRATAR UNA PÓLIZA DE SEGURO POR SU CUENTA Y A SU COSTA, EXPEDIDA POR
                    UNA
                    INSTITUCIÓN NACIONAL DE SEGUROS, DEBIDAMENTE AUTORIZADA, EN LA CUAL SE INCLUYA LA COBERTURA DE
                    RESPONSABILIDAD CIVIL, QUE AMPARE LOS DAÑOS Y PERJUICIOS Y QUE OCASIONE A LOS BIENES Y PERSONAL DE
                    “LA
                    DEPENDENCIA O ENTIDAD”, ASÍ COMO, LOS QUE CAUSE A TERCEROS EN SUS BIENES O PERSONAS, CON MOTIVO DE
                    LA
                    PRESTACIÓN DEL SERVICIO MATERIA DEL PRESENTE CONTRATO.
                </p>
            @endif
            <h6>
                DÉCIMA SÉPTIMA. TRANSPORTE
            </h6>
            <p>
                “EL PROVEEDOR” SE OBLIGA BAJO SU COSTA Y RIESGO, A TRASPORTAR LOS BIENES E INSUMOS NECESARIOS PARA LA
                PRESTACIÓN DEL SERVICIO, DESDE SU LUGAR DE ORIGEN, HASTA LAS INSTALACIONES SEÑALADAS EN EL (ESTABLECER
                EL DOCUMENTO O ANEXO DONDE SE ENCUENTRAN LOS DOMICILIOS, O EN SU DEFECTO REDACTARLOS) DEL PRESENTE
                CONTRATO.
            </p>
            <h6>
                DÉCIMA OCTAVA. IMPUESTOS Y DERECHOS
            </h6>
            <p>
                LOS IMPUESTOS, DERECHOS Y GASTOS QUE PROCEDAN CON MOTIVO DE LA PRESTACIÓN DE LOS SERVICIOS, OBJETO DEL
                PRESENTE CONTRATO, SERÁN PAGADOS POR “EL PROVEEDOR”, MISMOS QUE NO SERÁN REPERCUTIDOS A “LA DEPENDENCIA
                O ENTIDAD”.
            </p>
            <p>
                “LA DEPENDENCIA O ENTIDAD” SÓLO CUBRIRÁ, CUANDO APLIQUE, LO CORRESPONDIENTE AL IMPUESTO AL VALOR
                AGREGADO (IVA), EN LOS TÉRMINOS DE LA NORMATIVIDAD APLICABLE Y DE CONFORMIDAD CON LAS DISPOSICIONES
                FISCALES VIGENTES.
            </p>
            <h6>
                DÉCIMA NOVENA. PROHIBICIÓN DE CESIÓN DE DERECHOS Y OBLIGACIONES
            </h6>
            <p>
                “EL PROVEEDOR” NO PODRÁ CEDER TOTAL O PARCIALMENTE LOS DERECHOS Y OBLIGACIONES DERIVADOS DEL PRESENTE
                CONTRATO, A FAVOR DE CUALQUIER OTRA PERSONA FÍSICA O MORAL, CON EXCEPCIÓN DE LOS DERECHOS DE COBRO, EN
                CUYO CASO SE DEBERÁ CONTAR CON LA CONFORMIDAD PREVIA Y POR ESCRITO DE “LA DEPENDENCIA O ENTIDAD”.
            </p>
            <h6>
                VIGÉSIMA. DERECHOS DE AUTOR, PATENTES Y/O MARCAS
            </h6>
            <p>
                “EL PROVEEDOR” SERÁ RESPONSABLE EN CASO DE INFRINGIR PATENTES, MARCAS O VIOLE OTROS REGISTROS DE
                DERECHOS DE PROPIEDAD INDUSTRIAL A NIVEL NACIONAL E INTERNACIONAL, CON MOTIVO DEL CUMPLIMIENTO DE LAS
                OBLIGACIONES DEL PRESENTE CONTRATO, POR LO QUE SE OBLIGA A RESPONDER PERSONAL E ILIMITADAMENTE DE LOS
                DAÑOS Y PERJUICIOS QUE PUDIERA CAUSAR A “LA DEPENDENCIA O ENTIDAD” O A TERCEROS.
            </p>
            <p>
                DE PRESENTARSE ALGUNA RECLAMACIÓN EN CONTRA DE “LA DEPENDENCIA O ENTIDAD”, POR CUALQUIERA DE LAS CAUSAS
                ANTES MENCIONADAS, “EL PROVEEDOR”, SE OBLIGA A SALVAGUARDAR LOS DERECHOS E INTERESES DE “LA DEPENDENCIA
                O ENTIDAD” DE CUALQUIER CONTROVERSIA, LIBERÁNDOLA DE TODA RESPONSABILIDAD DE CARÁCTER CIVIL, PENAL,
                MERCANTIL, FISCAL O DE CUALQUIER OTRA ÍNDOLE, SACÁNDOLA EN PAZ Y A SALVO.
            </p>
            <p> EN CASO DE QUE “LA DEPENDENCIA O ENTIDAD” TUVIESE QUE EROGAR RECURSOS POR CUALQUIERA DE ESTOS CONCEPTOS,
                “EL PROVEEDOR” SE OBLIGA A REEMBOLSAR DE MANERA INMEDIATA LOS RECURSOS EROGADOS POR AQUELLA.</p>
            <h6>
                VIGÉSIMA PRIMERA. CONFIDENCIALIDAD Y PROTECCIÓN DE DATOS PERSONALES.
            </h6>
            <p>
                "LAS PARTES" ACUERDAN QUE LA INFORMACIÓN QUE SE INTERCAMBIE DE CONFORMIDAD CON LAS DISPOSICIONES DEL
                PRESENTE INSTRUMENTO, SE TRATARÁN DE MANERA CONFIDENCIAL, SIENDO DE USO EXCLUSIVO PARA LA CONSECUCIÓN
                DEL OBJETO DEL PRESENTE CONTRATO Y NO PODRÁ DIFUNDIRSE A TERCEROS DE CONFORMIDAD CON LO ESTABLECIDO EN
                LAS LEYES GENERAL Y FEDERAL, RESPECTIVAMENTE, DE TRANSPARENCIA Y ACCESO A LA INFORMACIÓN PÚBLICA, LEY
                GENERAL DE PROTECCIÓN DE DATOS PERSONALES EN POSESIÓN DE SUJETOS OBLIGADOS, Y DEMÁS LEGISLACIÓN
                APLICABLE.
            </p>
            <p>
                PARA EL TRATAMIENTO DE LOS DATOS PERSONALES QUE “LAS PARTES” RECABEN CON MOTIVO DE LA CELEBRACIÓN DEL
                PRESENTE CONTRATO, DEBERÁ DE REALIZARSE CON BASE EN LO PREVISTO EN LOS AVISOS DE PRIVACIDAD RESPECTIVOS.

                POR TAL MOTIVO, “EL PROVEEDOR” ASUME CUALQUIER RESPONSABILIDAD QUE SE DERIVE DEL INCUMPLIMIENTO DE SU
                PARTE, O DE SUS EMPLEADOS, A LAS OBLIGACIONES DE CONFIDENCIALIDAD DESCRITAS EN EL PRESENTE CONTRATO.

                ASIMISMO “EL PROVEEDOR” DEBERÁ OBSERVAR LO ESTABLECIDO EN EL ANEXO APLICABLE A LA CONFIDENCIALIDAD DE LA
                INFORMACIÓN DEL PRESENTE CONTRATO.
            </p>
            <h6>
                VIGÉSIMA SEGUNDA. SUSPENSIÓN TEMPORAL DE LA PRESTACIÓN DE LOS SERVICIOS.
            </h6>
            <p>
                CON FUNDAMENTO EN EL ARTÍCULO 55 BIS DE LA LEY DE ADQUISICIONES, ARRENDAMIENTOS Y SERVICIOS DEL SECTOR
                PÚBLICO Y 102, FRACCIÓN II, DE SU REGLAMENTO, “LA DEPENDENCIA O ENTIDAD” EN EL SUPUESTO DE CASO FORTUITO
                O DE FUERZA MAYOR O POR CAUSAS QUE LE RESULTEN IMPUTABLES, PODRÁ SUSPENDER LA PRESTACIÓN DE LOS
                SERVICIOS, DE MANERA TEMPORAL, QUEDANDO OBLIGADO A PAGAR A “EL PROVEEDOR”, AQUELLOS SERVICIOS QUE
                HUBIESEN SIDO EFECTIVAMENTE PRESTADOS, ASÍ COMO, AL PAGO DE GASTOS NO RECUPERABLES PREVIA SOLICITUD Y
                ACREDITAMIENTO.

                UNA VEZ QUE HAYAN DESAPARECIDO LAS CAUSAS QUE MOTIVARON LA SUSPENSIÓN, EL CONTRATO PODRÁ CONTINUAR
                PRODUCIENDO TODOS SUS EFECTOS LEGALES, SI “LA DEPENDENCIA O ENTIDAD” ASÍ LO DETERMINA; Y EN CASO QUE
                SUBSISTAN LOS SUPUESTOS QUE DIERON ORIGEN A LA SUSPENSIÓN, SE PODRÁ INICIAR LA TERMINACIÓN ANTICIPADA
                DEL CONTRATO, CONFORME LO DISPUESTO EN LA CLÁUSULA SIGUIENTE.

            </p>
            <h6>
                VIGÉSIMA TERCERA. TERMINACIÓN ANTICIPADA DEL CONTRATO
            </h6>
            <p>
                “LA DEPENDENCIA O ENTIDAD” CUANDO CONCURRAN RAZONES DE INTERÉS GENERAL, O BIEN, CUANDO POR CAUSAS
                JUSTIFICADAS SE EXTINGA LA NECESIDAD DE REQUERIR LOS SERVICIOS ORIGINALMENTE CONTRATADOS Y SE DEMUESTRE
                QUE DE CONTINUAR CON EL CUMPLIMIENTO DE LAS OBLIGACIONES PACTADAS, SE OCASIONARÍA ALGÚN DAÑO O PERJUICIO
                A “LA DEPENDENCIA O ENTIDAD”, O SE DETERMINE LA NULIDAD TOTAL O PARCIAL DE LOS ACTOS QUE DIERON ORIGEN
                AL PRESENTE CONTRATO, CON MOTIVO DE LA RESOLUCIÓN DE UNA INCONFORMIDAD O INTERVENCIÓN DE OFICIO, EMITIDA
                POR LA SECRETARÍA DE LA FUNCIÓN PÚBLICA, PODRÁ DAR POR TERMINADO ANTICIPADAMENTE EL PRESENTE CONTRATO
                SIN RESPONSABILIDAD ALGUNA PARA “LA DEPENDENCIA O ENTIDAD”, ELLO CON INDEPENDENCIA DE LO ESTABLECIDO EN
                LA CLÁUSULA QUE ANTECEDE.

                CUANDO “LA DEPENDENCIA O ENTIDAD” DETERMINE DAR POR TERMINADO ANTICIPADAMENTE EL CONTRATO, LO NOTIFICARÁ
                A “EL PROVEEDOR” HASTA CON 30 (TREINTA) DÍAS NATURALES ANTERIORES AL HECHO, DEBIENDO SUSTENTARLO EN UN
                DICTAMEN FUNDADO Y MOTIVADO, EN EL QUE, SE PRECISARÁN LAS RAZONES O CAUSAS QUE DIERON ORIGEN A LA MISMA
                Y PAGARÁ A “EL PROVEEDOR” LA PARTE PROPORCIONAL DE LOS SERVICIOS PRESTADOS, ASÍ COMO LOS GASTOS NO
                RECUPERABLES EN QUE HAYA INCURRIDO, PREVIA SOLICITUD POR ESCRITO, SIEMPRE QUE ÉSTOS SEAN RAZONABLES,
                ESTÉN DEBIDAMENTE COMPROBADOS Y SE RELACIONEN DIRECTAMENTE CON EL PRESENTE CONTRATO, LIMITÁNDOSE SEGÚN
                CORRESPONDA A LOS CONCEPTOS ESTABLECIDOS EN LA FRACCIÓN I, DEL ARTÍCULO 102 DEL REGLAMENTO DE LA LEY DE
                ADQUISICIONES, ARRENDAMIENTOS Y SERVICIOS DEL SECTOR PÚBLICO.

            </p>
            <h6>
                VIGÉSIMA CUARTA. RESCISIÓN
            </h6>
            <p>
                “LA DEPENDENCIA O ENTIDAD” PODRÁ INICIAR EN CUALQUIER MOMENTO EL PROCEDIMIENTO DE RESCISIÓN, CUANDO “EL
                PROVEEDOR” INCURRA EN ALGUNA DE LAS SIGUIENTES CAUSALES:
            <ol>
                <li>
                    a) CONTRAVENIR LOS TÉRMINOS PACTADOS PARA LA PRESTACIÓN DE LOS SERVICIOS, ESTABLECIDOS EN EL
                    PRESENTE CONTRATO.
                </li>
                <li>
                    b) TRANSFERIR EN TODO O EN PARTE LAS OBLIGACIONES QUE DERIVEN DEL PRESENTE CONTRATO A UN TERCERO
                    AJENO A LA RELACIÓN CONTRACTUAL.
                </li>
                <li>
                    c) CEDER LOS DERECHOS DE COBRO DERIVADOS DEL CONTRATO, SIN CONTAR CON LA CONFORMIDAD PREVIA Y POR
                    ESCRITO DE “LA DEPENDENCIA O ENTIDAD”.
                </li>
                <li>
                    d) SUSPENDER TOTAL O PARCIALMENTE Y SIN CAUSA JUSTIFICADA LA PRESTACIÓN DE LOS SERVICIOS DEL
                    PRESENTE CONTRATO.
                </li>
                <li>
                    e) NO REALIZAR LA PRESTACIÓN DE LOS SERVICIOS EN TIEMPO Y FORMA CONFORME A LO ESTABLECIDO EN EL
                    PRESENTE CONTRATO Y SUS RESPECTIVOS ANEXOS.
                </li>
                <li>
                    f) NO PROPORCIONAR A LOS ÓRGANOS DE FISCALIZACIÓN, LA INFORMACIÓN QUE LE SEA REQUERIDA CON MOTIVO DE
                    LAS AUDITORÍAS, VISITAS E INSPECCIONES QUE REALICEN.
                </li>
                <li>
                    g) SER DECLARADO EN CONCURSO MERCANTIL, O POR CUALQUIER OTRA CAUSA DISTINTA O ANÁLOGA QUE AFECTE SU
                    PATRIMONIO.
                </li>
                <li>
                    h) EN CASO DE QUE COMPRUEBE LA FALSEDAD DE ALGUNA MANIFESTACIÓN, INFORMACIÓN O DOCUMENTACIÓN
                    PROPORCIONADA PARA EFECTO DEL PRESENTE CONTRATO;
                </li>
                <li>
                    i) NO ENTREGAR DENTRO DE LOS 10 (DIEZ) DÍAS NATURALES SIGUIENTES A LA FECHA DE FIRMA DEL PRESENTE
                    CONTRATO, LA GARANTÍA DE CUMPLIMIENTO DEL MISMO.
                </li>
                <li>
                    j) EN CASO DE QUE LA SUMA DE LAS PENAS CONVENCIONALES O LAS DEDUCCIONES AL PAGO, IGUALAN EL MONTO
                    TOTAL DE LA GARANTÍA DE CUMPLIMIENTO DEL CONTRATO Y/O ALCANZAN EL 20% (VEINTE POR CIENTO) DEL MONTO
                    TOTAL DE ESTE CONTRATO CUANDO NO SE HAYA REQUERIDO LA GARANTÍA DE CUMPLIMIENTO;
                </li>
                <li>
                    k) DIVULGAR, TRANSFERIR O UTILIZAR LA INFORMACIÓN QUE CONOZCA EN EL DESARROLLO DEL CUMPLIMIENTO DEL
                    OBJETO DEL PRESENTE CONTRATO, SIN CONTAR CON LA AUTORIZACIÓN DE “LA DEPENDENCIA O ENTIDAD” EN LOS
                    TÉRMINOS DE LO DISPUESTO EN LA CLÁUSULA VIGÉSIMA PRIMERA DE CONFIDENCIALIDAD Y PROTECCIÓN DE DATOS
                    PERSONALES DEL PRESENTE INSTRUMENTO JURÍDICO;
                </li>
                <li>
                    l) IMPEDIR EL DESEMPEÑO NORMAL DE LABORES DE “LA DEPENDENCIA O ENTIDAD”;
                </li>
                <li>
                    m) CAMBIAR SU NACIONALIDAD POR OTRA E INVOCAR LA PROTECCIÓN DE SU GOBIERNO CONTRA RECLAMACIONES Y
                    ÓRDENES DE “LA DEPENDENCIA O ENTIDAD”, CUANDO SEA EXTRANJERO.
                </li>
                <li>
                    n) INCUMPLIR CUALQUIER OBLIGACIÓN DISTINTA DE LAS ANTERIORES Y DERIVADAS DEL PRESENTE CONTRATO.
                </li>

            </ol>
            <p>
                PARA EL CASO DE OPTAR POR LA RESCISIÓN DEL CONTRATO, “LA DEPENDENCIA O ENTIDAD” COMUNICARÁ POR ESCRITO A
                “EL
                PROVEEDOR” EL INCUMPLIMIENTO EN QUE HAYA INCURRIDO, PARA QUE EN UN TÉRMINO DE 5 (CINCO) DÍAS HÁBILES
                CONTADOS A PARTIR DEL DÍA SIGUIENTE DE LA NOTIFICACIÓN, EXPONGA LO QUE A SU DERECHO CONVENGA Y APORTE EN
                SU
                CASO LAS PRUEBAS QUE ESTIME PERTINENTES.
            </p>

            <p>
                TRANSCURRIDO DICHO TÉRMINO “LA DEPENDENCIA O ENTIDAD”, EN UN PLAZO DE 15 (QUINCE) DÍAS HÁBILES
                SIGUIENTES,
                TOMANDO EN CONSIDERACIÓN LOS ARGUMENTOS Y PRUEBAS QUE HUBIERE HECHO VALER “EL PROVEEDOR”, DETERMINARÁ DE
                MANERA FUNDADA Y MOTIVADA DAR O NO POR RESCINDIDO EL CONTRATO, Y COMUNICARÁ A “EL PROVEEDOR” DICHA
                DETERMINACIÓN DENTRO DEL CITADO PLAZO.
            </p>

            <p>
                CUANDO SE RESCINDA EL CONTRATO, SE FORMULARÁ EL FINIQUITO CORRESPONDIENTE, A EFECTO DE HACER CONSTAR LOS
                PAGOS QUE DEBA EFECTUAR “LA DEPENDENCIA O ENTIDAD” POR CONCEPTO DEL CONTRATO HASTA EL MOMENTO DE
                RESCISIÓN,
                O LOS QUE RESULTEN A CARGO DE “EL PROVEEDOR”.

            </p>
            <p>
                INICIADO UN PROCEDIMIENTO DE CONCILIACIÓN “LA DEPENDENCIA O ENTIDAD” PODRÁ SUSPENDER EL TRÁMITE DEL
                PROCEDIMIENTO DE RESCISIÓN.
            </p>

            <p>
                SI PREVIAMENTE A LA DETERMINACIÓN DE DAR POR RESCINDIDO EL CONTRATO SE REALIZA LA PRESTACIÓN DE LOS
                SERVICIOS, EL PROCEDIMIENTO INICIADO QUEDARÁ SIN EFECTO, PREVIA ACEPTACIÓN Y VERIFICACIÓN DE “LA
                DEPENDENCIA
                O ENTIDAD” DE QUE CONTINÚA VIGENTE LA NECESIDAD DE LA PRESTACIÓN DE LOS SERVICIOS, APLICANDO, EN SU
                CASO,
                LAS PENAS CONVENCIONALES CORRESPONDIENTES.
            </p>

            <p>
                “LA DEPENDENCIA O ENTIDAD” PODRÁ DETERMINAR NO DAR POR RESCINDIDO EL CONTRATO, CUANDO DURANTE EL
                PROCEDIMIENTO ADVIERTA QUE LA RESCISIÓN DEL MISMO PUDIERA OCASIONAR ALGÚN DAÑO O AFECTACIÓN A LAS
                FUNCIONES
                QUE TIENE ENCOMENDADAS. EN ESTE SUPUESTO, “LA DEPENDENCIA O ENTIDAD” ELABORARÁ UN DICTAMEN EN EL CUAL
                JUSTIFIQUE QUE LOS IMPACTOS ECONÓMICOS O DE OPERACIÓN QUE SE OCASIONARÍAN CON LA RESCISIÓN DEL CONTRATO
                RESULTARÍAN MÁS INCONVENIENTES.
            </p>

            <p>
                DE NO RESCINDIRSE EL CONTRATO, “LA DEPENDENCIA O ENTIDAD” ESTABLECERÁ CON “EL PROVEEDOR”, OTRO PLAZO,
                QUE LE
                PERMITA SUBSANAR EL INCUMPLIMIENTO QUE HUBIERE MOTIVADO EL INICIO DEL PROCEDIMIENTO, APLICANDO LAS
                SANCIONES
                CORRESPONDIENTES. EL CONVENIO MODIFICATORIO QUE AL EFECTO SE CELEBRE DEBERÁ ATENDER A LAS CONDICIONES
                PREVISTAS POR LOS DOS ÚLTIMOS PÁRRAFOS DEL ARTÍCULO 52 DE LA “LAASSP”.
            </p>

            <p>
                NO OBSTANTE, DE QUE SE HUBIERE FIRMADO EL CONVENIO MODIFICATORIO A QUE SE REFIERE EL PÁRRAFO ANTERIOR,
                SI SE
                PRESENTA DE NUEVA CUENTA EL INCUMPLIMIENTO, “LA DEPENDENCIA O ENTIDAD” QUEDARÁ EXPRESAMENTE FACULTADA
                PARA
                OPTAR POR EXIGIR EL CUMPLIMIENTO DEL CONTRATO, O RESCINDIRLO, APLICANDO LAS SANCIONES QUE PROCEDAN.
            </p>

            <p>
                SI SE LLEVARA A CABO LA RESCISIÓN DEL CONTRATO, Y EN EL CASO DE QUE A “EL PROVEEDOR” SE LE HUBIERAN
                ENTREGADO PAGOS PROGRESIVOS, ÉSTE DEBERÁ DE REINTEGRARLOS MÁS LOS INTERESES CORRESPONDIENTES, CONFORME A
                LO
                INDICADO EN EL ARTÍCULO 51, PÁRRAFO CUARTO, DE LA “LAASSP”.
            </p>

            <p>
                LOS INTERESES SE CALCULARÁN SOBRE EL MONTO DE LOS PAGOS PROGRESIVOS EFECTUADOS Y SE COMPUTARÁN POR DÍAS
                NATURALES DESDE LA FECHA DE SU ENTREGA HASTA LA FECHA EN QUE SE PONGAN EFECTIVAMENTE LAS CANTIDADES A
                DISPOSICIÓN DE “LA DEPENDENCIA O ENTIDAD”.
            </p>
            <h6>
                VIGÉSIMA QUINTA. RELACIÓN Y EXCLUSIÓN LABORAL
            </h6>
            <p>
                “EL PROVEEDOR” RECONOCE Y ACEPTA SER EL ÚNICO PATRÓN DE TODOS Y CADA UNO DE LOS TRABAJADORES QUE
                INTERVIENEN EN LA PRESTACIÓN DEL SERVICIO, DESLINDANDO DE TODA RESPONSABILIDAD A “LA DEPENDENCIA O
                ENTIDAD” RESPECTO DE CUALQUIER RECLAMO QUE EN SU CASO PUEDAN EFECTUAR SUS TRABAJADORES, SEA DE ÍNDOLE
                LABORAL, FISCAL O DE SEGURIDAD SOCIAL Y EN NINGÚN CASO SE LE PODRÁ CONSIDERAR PATRÓN SUSTITUTO, PATRÓN
                SOLIDARIO, BENEFICIARIO O INTERMEDIARIO.

                “EL PROVEEDOR” ASUME EN FORMA TOTAL Y EXCLUSIVA LAS OBLIGACIONES PROPIAS DE PATRÓN RESPECTO DE CUALQUIER
                RELACIÓN LABORAL, QUE EL MISMO CONTRAIGA CON EL PERSONAL QUE LABORE BAJO SUS ÓRDENES O INTERVENGA O
                CONTRATE PARA LA ATENCIÓN DE LOS ASUNTOS ENCOMENDADOS POR “LA DEPENDENCIA O ENTIDAD”, ASÍ COMO EN LA
                EJECUCIÓN DE LOS SERVICIOS.

                PARA CUALQUIER CASO NO PREVISTO, “EL PROVEEDOR” EXIME EXPRESAMENTE A “LA DEPENDENCIA O ENTIDAD” DE
                CUALQUIER RESPONSABILIDAD LABORAL, CIVIL O PENAL O DE CUALQUIER OTRA ESPECIE QUE EN SU CASO PUDIERA
                LLEGAR A GENERARSE, RELACIONADO CON EL PRESENTE CONTRATO.

                PARA EL CASO QUE, CON POSTERIORIDAD A LA CONCLUSIÓN DEL PRESENTE CONTRATO, “LA DEPENDENCIA O ENTIDAD”
                RECIBA UNA DEMANDA LABORAL POR PARTE DE TRABAJADORES DE “EL PROVEEDOR”, EN LA QUE SE DEMANDE LA
                SOLIDARIDAD Y/O SUSTITUCIÓN PATRONAL A “LA DEPENDENCIA O ENTIDAD”, “EL PROVEEDOR” QUEDA OBLIGADO A DAR
                CUMPLIMIENTO A LO ESTABLECIDO EN LA PRESENTE CLÁUSULA.


            </p>
            <h6>
                VIGÉSIMA SEXTA. DISCREPANCIAS
            </h6>
            <p>
                “LAS PARTES” CONVIENEN QUE, EN CASO DE DISCREPANCIA ENTRE LA CONVOCATORIA A LA LICITACIÓN PÚBLICA, LA
                INVITACIÓN A CUANDO MENOS TRES PERSONAS, O LA SOLICITUD DE COTIZACIÓN Y EL MODELO DE CONTRATO,
                PREVALECERÁ LO ESTABLECIDO EN LA CONVOCATORIA, INVITACIÓN O SOLICITUD RESPECTIVA, DE CONFORMIDAD CON EL
                ARTÍCULO 81, FRACCIÓN IV, DEL REGLAMENTO DE LA “LAASSP”.


            </p>
            <h6>
                VIGÉSIMA SÉPTIMA. CONCILIACIÓN.
            </h6>
            <p>
                “LAS PARTES” ACUERDAN QUE PARA EL CASO DE QUE SE PRESENTEN DESAVENENCIAS DERIVADAS DE LA EJECUCIÓN Y
                CUMPLIMIENTO DEL PRESENTE CONTRATO PODRÁN SOMETERSE AL PROCEDIMIENTO DE CONCILIACIÓN ESTABLECIDO EN LOS
                ARTÍCULOS 77, 78 Y 79 DE LA LEY DE ADQUISICIONES, ARRENDAMIENTOS Y SERVICIOS DEL SECTOR PÚBLICO, Y 126
                AL 136 DE SU REGLAMENTO.

            </p>
            <h6>
                VIGÉSIMA OCTAVA. DOMICILIOS
            </h6>
            <p>
                “LAS PARTES” SEÑALAN COMO SUS DOMICILIOS LEGALES PARA TODOS LOS EFECTOS A QUE HAYA LUGAR Y QUE SE
                RELACIONAN EN EL PRESENTE CONTRATO, LOS QUE SE INDICAN EN EL APARTADO DE DECLARACIONES, POR LO QUE
                CUALQUIER NOTIFICACIÓN JUDICIAL O EXTRAJUDICIAL, EMPLAZAMIENTO, REQUERIMIENTO O DILIGENCIA QUE EN DICHOS
                DOMICILIOS SE PRACTIQUE, SERÁ ENTERAMENTE VÁLIDA, AL TENOR DE LO DISPUESTO EN EL TÍTULO TERCERO DEL
                CÓDIGO CIVIL FEDERAL.
            </p>
            <h6>
                VIGÉSIMA NOVENA. LEGISLACIÓN APLICABLE
            </h6>
            <p>
                “LAS PARTES” SE OBLIGAN A SUJETARSE ESTRICTAMENTE PARA LA PRESTACIÓN DE LOS SERVICIOS OBJETO DEL
                PRESENTE CONTRATO A TODAS Y CADA UNA DE LAS CLÁUSULAS QUE LO INTEGRAN, SUS ANEXOS QUE FORMAN PARTE
                INTEGRAL DEL MISMO, A LA LEY DE ADQUISICIONES, ARRENDAMIENTOS Y SERVICIOS DEL SECTOR PÚBLICO, SU
                REGLAMENTO; CÓDIGO CIVIL FEDERAL; LEY FEDERAL DE PROCEDIMIENTO ADMINISTRATIVO, CÓDIGO FEDERAL DE
                PROCEDIMIENTOS CIVILES; LEY FEDERAL DE PRESUPUESTO Y RESPONSABILIDAD HACENDARIA Y SU REGLAMENTO.
            </p>
            <h6>
                TRIGÉSIMA. JURISDICCIÓN
            </h6>
            <p>
                “LAS PARTES” CONVIENEN QUE, PARA LA INTERPRETACIÓN Y CUMPLIMIENTO DE ESTE CONTRATO, ASÍ COMO PARA LO NO
                PREVISTO EN EL MISMO, SE SOMETERÁN A LA JURISDICCIÓN Y COMPETENCIA DE LOS TRIBUNALES FEDERALES EN LA
                CIUDAD DE MÉXICO, RENUNCIANDO EXPRESAMENTE AL FUERO QUE PUDIERA CORRESPONDERLES EN RAZÓN DE SU DOMICILIO
                ACTUAL O FUTURO.
            </p>
            <div class="Titulos">
                <h5>
                    FIRMANTES O SUSCRIPCIÓN.
                </h5>
            </div>
            <p>
                LEÍDO QUE FUE Y ENTERADAS LAS PARTES DEL CONTENIDO Y ALCANCE LEGAL DEL PRESENTE CONTRATO, LO FIRMAN POR
                QUINTUPLICADO EN LA CIUDAD DE OAXACA DE JÚAREZ, OAXACA, EL DIA 21 DE AGOSTO DE 2023.

                POR LO ANTERIORMENTE EXPUESTO, TANTO “LA ENTIDAD” COMO “EL PRESTADOR” DECLARAN ESTAR CONFORMES Y BIEN
                ENTERADOS DE LAS CONSECUENCIAS, VALOR Y ALCANCE LEGAL DE TODAS Y CADA UNA DE LAS ESTIPULACIONES QUE EL
                PRESENTE INSTRUMENTO JURÍDICO CONTIENE, POR LO QUE LO RATIFICAN Y FIRMAN POR QUINTUPLICADO EN LA CIUDAD
                DE OAXACA DE JÚAREZ, OAXACA, EL DIA 21 DE AGOSTO DE 2023.
            </p>
            <div class="Titulos">
                <h5>
                    POR:
                </h5>
                <h5>
                    “LA ENTIDAD”
                </h5>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col-5">NOMBRE</th>
                            <th scope="col-3">CARGO</th>
                            <th scope="col-4">R.F.C.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td>{{ $empleadosubdelegado->nombre }} {{ $empleadosubdelegado->apellido_paterno }}
                                {{ $empleadosubdelegado->apellido_materno }}</td>
                            <td>{{ $empleadosubdelegado->Cargos->nombre_cargo }}</td>
                            <td>{{ $empleadosubdelegado->rfc }}</td>
                        </tr>
                        <tr class="">

                            <td><strong>{{ $contrato->AdminContratos->nombre }}
                                    {{ $contrato->AdminContratos->apellido_paterno }}
                                    {{ $contrato->AdminContratos->apellido_materno }}</strong></td>
                            <td> <strong>{{ $contrato->AdminContratos->Cargos->nombre_cargo }}</strong>
                            </td>
                            <td><strong>{{ $contrato->AdminContratos->rfc }}</strong></td>
                        </tr>
                        <tr class="">
                            <td>{{ $empleadomateriales->nombre }} {{ $empleadomateriales->apellido_paterno }}
                                {{ $empleadomateriales->apellido_materno }}</td>
                            <td>{{ $empleadomateriales->Cargos->nombre_cargo }}</td>
                            <td>{{ $empleadomateriales->rfc }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="Titulos">
                <h5>
                    POR:
                </h5>
                <h5>
                    “EL PROVEEDOR”
                </h5>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col-6">NOMBRE</th>
                            <th scope="col-6S">R.F.C.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td class="col-6">
                                <p>
                                    {{ $contrato->Proveedor->representante }}
                                </p>
                                <p>
                                    {{ $contrato->Proveedor->nombre }}
                                </p>
                            </td>
                            <td>{{ $contrato->Proveedor->rfc }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </main>
    <footer>

    </footer>
</body>

</html>
