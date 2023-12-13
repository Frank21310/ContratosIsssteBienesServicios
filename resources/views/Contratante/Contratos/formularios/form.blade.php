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
                    <li>Es una persona física, de nacionalidad
                        <select name="nacionalidad_proveedor" id="nacionalidad_proveedor">
                            <option value="Mexicana">Mexicana</option>
                            <option value="otra">Otra</option>
                        </select>
                        <div id="textoAMostrar">
                            lo que acredita con <input type="text" name="acreditacion_proveedor">, expedida por
                            <input type="text" name="expedida_proveedor">
                        </div>
                    </li>
                    <br>
                    <li>Es una persona moral legalmente constituida mediante <input type="text"
                            name="instrumento proveedor">, denominada
                        <input type="text" name="razon_social_proveedor">, cuyo objeto social es <input
                            type="text" name="objetivo_social_proveedor">, entre otros,
                        inscrita en el Registro Público de la Propiedad de <input type="text"
                            name="registro_publico_proveedor"> con el folio <input type="text"
                            name="folio_proveedor"> de fecha
                        <input type="text" name="registro_publico_proveedor">.
                    </li>
                    <br>
                    <li>
                        REÚNE LAS CONDICIONES TÉCNICAS, JURÍDICAS Y ECONÓMICAS, Y CUENTA CON LA ORGANIZACIÓN Y ELEMENTOS
                        NECESARIOS PARA SU CUMPLIMIENTO.
                    </li>
                    <br>
                    <li>
                        CUENTA CON SU REGISTRO FEDERAL DE CONTRIBUYENTES CAI1711171D1
                    </li>
                    <br>
                    <li>
                        BAJO PROTESTA DE DECIR VERDAD, ESTÁ AL CORRIENTE EN LOS PAGOS DE SUS OBLIGACIONES FISCALES, EN
                        ESPECÍFICO LAS PREVISTAS EN EL ARTÍCULO 32-D DEL CÓDIGO FISCAL FEDERAL VIGENTE, ASÍ COMO DE SUS
                        OBLIGACIONES FISCALES EN MATERIA DE SEGURIDAD SOCIAL, ANTE INSTITUTO DEL FONDO NACIONAL DE LA
                        VIVIENDA PARA LOS TRABAJADORES (INFONAVIT) Y INSTITUTO MEXICANO DEL SEGURO SOCIAL (IMSS); LO QUE
                        ACREDITA CON LAS OPINIONES DE CUMPLIMIENTO DE OBLIGACIONES FISCALES Y EN MATERIA DE SEGURIDAD
                        SOCIAL EN SENTIDO POSITIVO, EMITIDAS POR EL SAT E IMSS, RESPECTIVAMENTE, ASÍ COMO CON LA
                        CONSTANCIA DE SITUACIÓN FISCAL EN MATERIA DE APORTACIONES PATRONALES Y ENTERO DE DESCUENTOS, SIN
                        ADEUDO, EMITIDA POR EL INFONAVIT, LAS CUALES SE ENCUENTRAN VIGENTES Y OBRAN EN EL EXPEDIENTE
                        RESPECTIVO.
                    </li>
                    <br>
                    <li>
                        SEÑALA COMO SU DOMICILIO PARA TODOS LOS EFECTOS LEGALES EL UBICADO EN <input type="text"
                            name="domicilio proveedor">.
                    </li>
                </ol>
            </li>
            <li><strong>De “LAS PARTES”:</strong>
                <ol class="decimal">
                    <li>
                        QUE ES SU VOLUNTAD CELEBRAR EL PRESENTE CONTRATO Y SUJETARSE A SUS TÉRMINOS Y CONDICIONES, PARA
                        LO CUAL SE RECONOCEN LAS FACULTADES Y CAPACIDADES, MISMAS QUE NO LES HAN SIDO REVOCADAS O
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
        “EL PROVEEDOR” acepta y se obliga a proporcionar a “LA DEPENDENCIA O ENTIDAD” la prestación del servicio de
        (DESCRIPCIÓN), en los términos y condiciones establecidos en la convocatoria (TRATÁNDOSE DE LICITACIONES
        PÚBLICAS O INVITACIÓN A CUANDO MENOS TRES PERSONAS), este contrato y sus anexos (NUMERAR Y DESCRIBIR LOS ANEXOS)
        que forman parte integrante del mismo.
    </p>
    <h6>
        <p>
            SEGUNDA. MONTO DEL CONTRATO
        </p>
    </h6>
    @if ($requisicion->tipo_id == 1 /* && $requisicion->pluralidad == 1*/)
        <p>
            “EL PROVEEDOR” acepta y se obliga a proporcionar a “LA DEPENDENCIA O ENTIDAD” la prestación del servicio de
            (DESCRIPCIÓN), en los términos y condiciones establecidos en la convocatoria (TRATÁNDOSE DE LICITACIONES
            PÚBLICAS O INVITACIÓN A CUANDO MENOS TRES PERSONAS), este contrato y sus anexos (NUMERAR Y DESCRIBIR LOS
            ANEXOS)
            que forman parte integrante del mismo.
        </p>
    @else
    @endif
    @if ($requisicion->tipo_id == 1 && $requisicion->pluralidad == 1)
        <p>
            “LA DEPENDENCIA O ENTIDAD” conviene con “EL PROVEEDOR” que el monto total de los servicios es por la
            cantidad de $ (MONTO TOTAL DEL CONTRATO SIN IMPUESTOS) más impuestos que asciende a $ (IMPUESTOS), lo que
            hace un total de (MONTO TOTAL CON IMPUESTOS) importe que se cubrirá en cada uno de los ejercicios fiscales,
            de acuerdo a lo siguiente:
        </p>
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
            Las partes convienen expresamente que las obligaciones de este contrato, cuyo cumplimiento se encuentra
            previsto realizar durante los ejercicios fiscales de (CONCATENAR EJERCICIOS FISCALES QUE INVOLUCRAN LA
            PLURIANUALIDAD) quedarán sujetas para fines de su ejecución y pago a la disponibilidad presupuestaria, con
            que cuente “LA DEPENDENCIA O ENTIDAD”, conforme al Presupuesto de Egresos de la Federación que para el
            ejercicio fiscal correspondiente apruebe la Cámara de Diputados del H. Congreso de la Unión, sin que la no
            realización de la referida condición suspensiva origine responsabilidad para alguna de las partes.
        </p>
    @else
    @endif
    <p>
        El(los) precio(s) unitario(s) del presente contrato, expresado(s) en moneda nacional es(son):
    </p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Partida</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Unidad</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio Unitario</th>
                <th scope="col">Precion total antes de imp.</th>
                <th scope="col">Precion total despues de imp.</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th>0</th>
                <th>0</th>
                <td>0</td>
                <th>0</th>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </tbody>
    </table>
    <input type="text" class="form-control" name="AnexoContrato" placeholder="Idicar anexo">
    <p>
        El precio unitario es considerado fijo y en moneda nacional (TIPO MONEDA) hasta que concluya la relación
        contractual que se formaliza, incluyendo todos los conceptos y costos involucrados en la prestación del servicio
        de (DESCRIPCIÓN), por lo que “EL PROVEEDOR” no podrá agregar ningún costo extra y los precios serán inalterables
        durante la vigencia del presente contrato.
    </p>
    @if ($requisicion->tipo_id > 1 && $requisicion->pluralidad == 1)
        <p>
            “LA DEPENDENCIA O ENTIDAD” pagará a “EL PROVEEDOR” como contraprestación por los servicios objeto de este
            contrato, la cantidad mínima de (MONTO MÍNIMO TOTAL DEL CONTRATO) más impuestos por $_____________ (INDICAR
            LA CANTIDAD EN LETRA) y un monto máximo de (MONTO MÁXIMO TOTAL DEL CONTRATO), más impuestos que asciende a
            $_______ (INDICAR LA CANTIDAD EN LETRA).
        </p>
    @else
    @endif
    @if ($requisicion->tipo_id > 1 && $requisicion->pluralidad == 1)
        <p>
            “LA DEPENDENCIA O ENTIDAD” conviene con “EL ARRENDADOR” que el monto mínimo del arrendamiento objeto del
            presente contrato para los ejercicios fiscales de (CONCATENAR EJERCICIOS FISCALES QUE INVOLUCRAN LA
            PLURIANUALIDAD) es por la cantidad de (MONTO MÍNIMO TOTAL) más impuestos que asciende a $_____________
            (INDICAR LA CANTIDAD EN LETRA).
        </p>
        <p>
            Asimismo, que el monto máximo de los servicios para los ejercicios fiscales de (INCORPORAR EJERCICIO) es por
            la cantidad de (MONTO MÁXIMO TOTAL DEL CONTRATO), más impuestos que asciende a $_______ (Indicar la cantidad
            en letra).
        </p>
        <p>
            Importe mínimos y máximos a pagar en cada ejercicio fiscal de acuerdo a lo siguiente:
        </p>
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
            Las partes convienen expresamente que las obligaciones de este contrato, cuyo cumplimiento se encuentra
            previsto realizar durante los ejercicios fiscales de (CONCATENAR EJERCICIOS FISCALES QUE INVOLUCRAN LA
            PLURIANUALIDAD) quedarán sujetas para fines de su ejecución y pago a la disponibilidad presupuestaria, con
            que cuente “LA DEPENDENCIA O ENTIDAD”, conforme al Presupuesto de Egresos de la Federación que para el
            ejercicio fiscal correspondiente apruebe la Cámara de Diputados del H. Congreso de la Unión, sin que la no
            realización de la referida condición suspensiva origine responsabilidad para alguna de las partes.
        </p>
    @else
    @endif
    @if ($requisicion->tipo_id > 1)
        <p>
            El(los) precio(s) unitario(s) del presente contrato, expresado(s) en moneda nacional es (son):
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Partida</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Unidad</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio Unitario</th>
                    <th scope="col">Precion total antes de imp.</th>
                    <th scope="col">Precion total despues de imp.</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>0</th>
                    <th>0</th>
                    <td>0</td>
                    <th>0</th>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
        <p>
            El precio unitario es considerado fijo y en moneda nacional (TIPO MONEDA) hasta que concluya la relación
            contractual que se formaliza, incluyendo todos los conceptos y costos involucrados en la prestación del
            servicio de (DESCRIPCIÓN), por lo que “EL PROVEEDOR” no podrá agregar ningún costo extra y los precios serán
            inalterables durante la vigencia del presente contrato.
        </p>
    @else
    @endif
    <h6>
        <p>
            TERCERA. ANTICIPO
        </p>
    </h6>
    @if ($requisicion->aticipos == 0)
        <p>
            Para el presente contrato “LA DEPENDENCIA O ENTIDAD” no otorgará anticipo a “EL PROVEEDOR”
        </p>
    @else
        <p>
            Se otorgarán a “EL PROVEEDOR”, un anticipo del _______________ por ciento sobre el monto total del contrato
            equivalente a _____________.
        </p>
    @endif
    <h6>
        <p>
            CUARTA. FORMA Y LUGAR DE PAGO
        </p>
    </h6>
    <p>
        “LA DEPENDENCIA O ENTIDAD” efectuará el pago a través de transferencia electrónica en pesos de los Estados
        Unidos Mexicanos, a mes vencido (otra temporalidad o calendario establecido) o porcentaje de avance (pagos
        progresivos), conforme a los servicios efectivamente prestados y a entera satisfacción del administrador del
        contrato y de acuerdo con lo establecido en el "ANEXO _______" que forma parte integrante de este contrato.
    </p>
    <p>
        El pago se realizará en un plazo máximo de 20 (veinte) días naturales siguientes, contados a partir de la fecha
        en que sea entregado y aceptado el Comprobante Fiscal Digital por Internet (CFDI) o factura electrónica a “LA
        DEPENDENCIA O ENTIDAD”, con la aprobación (firma) del Administrador del presente contrato
    </p>
    <!-- MOSTRAR SI EL PROVEEDOR ES EXTRANGERO-->
    <p>
        El cómputo del plazo para realizar el pago se contabilizará a partir del día hábil siguiente de la aceptación
        del CFDI o factura electrónica, y ésta reúna los requisitos fiscales que establece la legislación en la materia,
        el desglose de los servicios prestados, los precios unitarios, se verifique su autenticidad, no existan
        aclaraciones al importe y vaya acompañada con la documentación soporte de la prestación de los servicios
        facturados.
    </p>
    <p>
        De conformidad con el artículo 90, del Reglamento de la “LAASSP”, en caso de que el CFDI o factura electrónica
        entregado presente errores, el Administrador del presente contrato o a quien éste designe por escrito, dentro de
        los 3 (tres) días hábiles siguientes de su recepción, indicará a “EL PROVEEDOR” las deficiencias que deberá
        corregir; por lo que, el procedimiento de pago reiniciará en el momento en que “EL PROVEEDOR” presente el CFDI
        y/o documentos soporte corregidos y sean aceptados.
    </p>
    <p>
        El tiempo que “EL PROVEEDOR” utilice para la corrección del CFDI y/o documentación soporte entregada, no se
        computará para efectos de pago, de acuerdo con lo establecido en el artículo 51 de la “LAASSP”.
    </p>
    <p>
        EL CFDI O FACTURA ELECTRÓNICA DEBERÁ SER PRESENTADA DE MANERA FISICA EN LA SUBDELEGACION DE ADMINISTRACION Y
        ENVIADA AL CORREO fer.ramirez@issste.gob.mx EL CFDI O FACTURA ELECTRÓNICA SE DEBERÁ PRESENTAR DESGLOSANDO EL
        IMPUESTO CUANDO APLIQUE.
    </p>
    <p>
        “EL PROVEEDOR” manifiesta su conformidad que, hasta en tanto no se cumpla con la verificación, supervisión y
        aceptación de la prestación de los servicios, no se tendrán como recibidos o aceptados por el Administrador del
        presente contrato.
    </p>
    <p>
        Para efectos de trámite de pago, “EL PROVEEDOR” deberá ser titular de una cuenta bancaria, en la que se
        efectuará la
        transferencia electrónica de pago, respecto de la cual deberá proporcionar toda la información y documentación
        que
        le sea requerida por “LA DEPENDENCIA O ENTIDAD”, para efectos del pago.
    </p>
    <p>
        “EL PROVEEDOR” deberá presentar la información y documentación “LA DEPENDENCIA O ENTIDAD” le solicite para el
        trámite de pago, atendiendo a las disposiciones legales e internas de “LA DEPENDENCIA O ENTIDAD”.
    </p>
    <p>
        El pago de la prestación de los servicios recibidos, quedará condicionado al pago que “EL PROVEEDOR” deba
        efectuar por concepto de penas convencionales y, en su caso, deductivas.
    </p>
    INSTRUCCIÓN: EN CASO DE PAGO EN MONEDA EXTRANJERA, INDICAR LA FUENTE OFICIAL QUE SE TOMARÁ PARA LLEVAR A CABO LA
    CONVERSIÓN Y LA TASA DE CAMBIO O LA FECHA A CONSIDERAR PARA HACERLO:
    <p>
        La fuente oficial para la conversión de la moneda extranjera será el Banco de México y la fecha a considerar
        será ___________________.
    </p>
    <p>
        Para el caso que se presenten pagos en exceso, se estará a lo dispuesto por el artículo 51, párrafo tercero, de
        la “LAASSP”.
    </p>
    <h6>
        QUINTA. LUGAR, PLAZOS Y CONDICIONES DE LA PRESTACIÓN DE LOS SERVICIOS.
    </h6>
    <p>
        La prestación de los servicios, se realizará conforme a los plazos, condiciones y entregables establecidos por
        “LA DEPENDENCIA O ENTIDAD” en el (ESTABLECER EL DOCUMENTO O ANEXO DONDE SE ENCUENTRAN DICHOS PLAZOS, CONDICIONES
        Y ENTREGABLES O EN SU DEFECTO REDACTARLOS, LOS CUALES FORMAN PARTE DEL PRESENTE CONTRATO).
    </p>
    <p>
        Los servicios serán prestados en los domicilios señalados en el (ESTABLECER EL DOCUMENTO O ANEXO DONDE SE
        ENCUENTRAN LOS DOMICILIOS, O EN SU DEFECTO REDACTARLOS) y fechas establecidas en el mismo;
    </p>
    <p>
        En los casos que derivado de la verificación se detecten defectos o discrepancias en la prestación del servicio
        o incumplimiento en las especificaciones técnicas, “EL PROVEEDOR” contará con un plazo de_________ para la
        reposición o corrección, contados a partir del momento de la notificación por correo electrónico y/o escrito,
        sin costo adicional para “LA DEPENDENCIA O ENTIDAD”.
    </p>
    <h6>
        SEXTA. VIGENCIA
    </h6>
    <p>
        “LAS PARTES” convienen en que la vigencia del presente contrato será del (INCORPORAR FECHA DE INICIO) al
        (INCORPORAR FECHA DE TÉRMINO DEL CONTRATO).
    </p>
    <h6>
        SÉPTIMA. MODIFICACIONES DEL CONTRATO.
    </h6>
    <p>
        “LAS PARTES” están de acuerdo que “LA DEPENDENCIA O ENTIDAD” por razones fundadas y explícitas podrá ampliar el
        monto o la cantidad de los servicios, de conformidad con el artículo 52 de la “LAASSP”, siempre y cuando las
        modificaciones no rebasen en su conjunto el 20% (veinte por ciento) de los establecidos originalmente, el precio
        unitario sea igual al originalmente pactado y el contrato esté vigente. La modificación se formalizará mediante
        la celebración de un Convenio Modificatorio.
    </p>
    <p>
        “LA DEPENDENCIA O ENTIDAD”, podrá ampliar la vigencia del presente instrumento, siempre y cuando, no implique
        incremento del monto contratado o de la cantidad del servicio, siendo necesario que se obtenga el previo
        consentimiento de “EL PROVEEDOR”.
    </p>
    <p>
        De presentarse caso fortuito o fuerza mayor, o por causas atribuibles a “LA DEPENDENCIA O ENTIDAD”, se podrá
        modificar el plazo del presente instrumento jurídico, debiendo acreditar dichos supuestos con las constancias
        respectivas. La modificación del plazo por caso fortuito o fuerza mayor podrá ser solicitada por cualquiera de
        “LAS PARTES”.
    </p>
    <p>
        En los supuestos previstos en los dos párrafos anteriores, no procederá la aplicación de penas convencionales
        por atraso.
    </p>
    <p>
        Cualquier modificación al presente contrato deberá formalizarse por escrito, y deberá suscribirse por el
        servidor público de “LA DEPENDENCIA O ENTIDAD” que lo haya hecho, o quien lo sustituya o esté facultado para
        ello, para lo cual “EL PROVEEDOR” realizará el ajuste respectivo de la garantía de cumplimiento, en términos del
        artículo 91, último párrafo del Reglamento de la LAASSP, salvo que por disposición legal se encuentre exceptuado
        de presentar garantía de cumplimiento.
    </p>
    <p>
        “LA DEPENDENCIA O ENTIDAD” se abstendrá de hacer modificaciones que se refieran a precios, anticipos, pagos
        progresivos, especificaciones y, en general, cualquier cambio que implique otorgar condiciones más ventajosas a
        un proveedor comparadas con las establecidas originalmente.
    </p>
    <h6>
        OCTAVA. GARANTÍA DE LOS SERVICIOS
    </h6>
    @if ($requisicion->garantia1_id == 3)
        <p>
            “EL PROVEEDOR” se obliga con “LA DEPENDENCIA O ENTIDAD” a entregar al inicio de la prestación del servicio,
            una garantía por la calidad de los servicios prestados, por (INCORPORAR NUMERO DE MESES) meses, la cual se
            constituirá (indicar la forma de garantizarla), pudiendo ser mediante la póliza de garantía, en términos de
            los artículos 77 y 78 de la Ley Federal de Protección al Consumidor.
        </p>
    @else
        <p>
            Para la prestación de los servicios materia del presente contrato, no se requiere que “EL PROVEEDOR”
            presente una garantía por la calidad de los servicios contratados.
        </p>
    @endif
    <h6>
        NOVENA. GARANTÍA
    </h6>
    @if ($requisicion->aticipos == 1)
        <strong>A) GARANTIA DE ANTICIPO</strong>
        <p>“EL PROVEEDOR” entregará a “LA DEPENDENCIA O ENTIDAD”, previamente a la entrega del anticipo una garantía
            constituida por la totalidad del monto del(os) anticipo(s) recibido(s).

        </p>
        <p>
            Para la prestación de los servicios materia del presente contrato, no se requiere que “EL PROVEEDOR”
            presente una garantía por la calidad de los servicios contratados.
        </p>
        <p>
            El otorgamiento de anticipo, deberá garantizarse en los términos de los artículos 48, de la “LAASSP”; 81,
            párrafo primero y fracción V, de su Reglamento.
        </p>
        <p>
            Si las disposiciones jurídicas aplicables lo permiten, la entrega de la garantía de anticipo podrá
            realizarse de manera electrónica.
        </p>
        <p>
            Una vez amortizado el cien por ciento del anticipo, el servidor público facultado por “LA DEPENDENCIA O
            ENTIDAD” procederá inmediatamente a extender la constancia de cumplimiento de dicha obligación contractual y
            dará inicio a los trámites para la cancelación de la garantía, lo que comunicará a “EL PROVEEDOR”.
        </p>
    @else
    @endif
    @if ($requisicion->garantia1_id == 2 || $requisicion->garantia_2_id == 2 || $requisicion->garantia_3_id == 2)
        <strong>B)	CUMPLIMIENTO DEL CONTRATO.</strong>
        <p>
            Conforme a los artículos 48, fracción II, 49, fracción I (dependencias) o II (entidades), de la “LAASSP”; 85, fracción III, y 103 de su Reglamento “EL PROVEEDOR” se obliga a constituir una garantía (EN CASO DE SER INDIVISIBLE) indivisible por el cumplimiento fiel y exacto de todas las obligaciones derivadas de este contrato; (EN CASO DE SER INDIVISIBLE) divisible y en este caso se hará efectiva en proporción al incumplimiento de la obligación principal, mediante fianza expedida por compañía afianzadora mexicana autorizada por la Comisión Nacional de Seguros y de Fianzas, a favor de la _(TESORERÍA DE LA FEDERACIÓN O DE LA ENTIDAD), por un importe equivalente al (INCORPORAR EL PORCENTAJE DE LA GARANTÍA DE CUMPLIMIENTO) del monto total del contrato, sin incluir el IVA. 

        </p>
        <p>
            Dicha fianza deberá ser entregada a “LA DEPENDENCIA O ENTIDAD”, a más tardar dentro de los 10 días naturales posteriores a la firma del presente contrato.
        </p>
        <p>
            Si las disposiciones jurídicas aplicables lo permiten, la entrega de la garantía de cumplimiento se podrá realizar de manera electrónica.
        </p>
        <p>
            En caso de que “EL PROVEEDOR” incumpla con la entrega de la garantía en el plazo establecido, “LA DEPENDENCIA O ENTIDAD” podrá rescindir el contrato y dará vista al Órgano Interno de Control para que proceda en el ámbito de sus facultades.
        </p>
        <p>
            La garantía de cumplimiento no será considerada como una limitante de responsabilidad de “EL PROVEEDOR”, derivada de sus obligaciones y garantías estipuladas en el presente instrumento jurídico, y no impedirá que  “LA DEPENDENCIA O ENTIDAD” reclame la indemnización por cualquier incumplimiento que pueda exceder el valor de la garantía de cumplimiento.
        </p>
        <p>
            En caso de incremento al monto del presente instrumento jurídico o modificación al plazo,  “EL PROVEEDOR” se obliga a entregar a  “LA DEPENDENCIA O ENTIDAD”, dentro de los 10 (diez días) naturales siguientes a la formalización del mismo, de conformidad con el último párrafo del artículo 91, del Reglamento de la “LAASSP”, los documentos modificatorios o endosos correspondientes, debiendo contener en el documento la estipulación de que se otorga de manera conjunta, solidaria e inseparable de la garantía otorgada inicialmente.   
        </p>
        <p>
            Cuando la contratación abarque más de un ejercicio fiscal, la garantía de cumplimiento del contrato, podrá ser por el porcentaje que corresponda del monto total por erogar en el ejercicio fiscal de que se trate, y deberá ser renovada por “EL PROVEEDOR” cada ejercicio fiscal por el monto que se ejercerá en el mismo, la cual deberá presentarse a “LA DEPENDENCIA O ENTIDAD” a más tardar dentro de los primeros diez días naturales del ejercicio fiscal que corresponda.
        </p>
        <p>
            Una vez cumplidas las obligaciones a satisfacción, el servidor público facultado por “LA DEPENDENCIA O ENTIDAD” procederá inmediatamente a extender la constancia de cumplimiento de las obligaciones contractuales y dará inicio a los trámites para la cancelación de la garantía cumplimiento del contrato, lo que comunicará a  “EL PROVEEDOR”.
        </p>
    @else
        <p>
            “EL PROVEEDOR” esta exceptuado de la presentación de la garantía de cumplimiento, con fundamento en los artículos 15 y 294, fracción VI de la Ley de Instituciones de Seguros y Fianzas, ya que las aseguradoras no se encuentran obligadas a presentar una póliza de fianza que garanticé el cumplimiento de sus contratos.
        </p>
        <p>
            Cuando la prestación de los servicios, se realice en un plazo menor a diez días naturales, “EL PROVEEDOR” quedará exceptuado de la presentación de la garantía de cumplimiento, de conformidad con lo establecido en el artículo 48 último párrafo de la "LAASSP".
        </p>
        <p>
            En términos de lo establecido en el artículo 48, segundo párrafo de la "LAASSP" se exceptúa a “EL PROVEEDOR” de la presentación de la garantía de cumplimiento, ya que la contratación se fundamenta en el artículo 41, fracción ___ o 42 de la "LAASSP".
        </p>


    @endif
    @if ($requisicion->aticipos == 6)
        <strong>C)	GARANTÍA PARA RESPONDER POR VICIOS OCULTOS.</strong>
        <p>
            “EL PROVEEDOR” deberá responder por los defectos, vicios ocultos y por la calidad de los servicios prestados, así como de cualquier otra responsabilidad en que hubiere incurrido, en los términos señalados en este Contrato, convenios modificatorios respectivos y en la legislación aplicable, de conformidad con los artículos 53, párrafo segundo de la Ley de Adquisiciones, Arrendamientos y Servicios del Sector Público y 96, párrafo segundo de su Reglamento. 
        </p>
        <p>
            “EL PROVEEDOR”, quedará liberado de su obligación, una vez transcurridos (INCORPORAR NUMERO DE MESES), contados a partir de la fecha en que conste por escrito la recepción física de los servicios prestados, siempre y cuando “LA DEPENDENCIA O ENTIDAD” no haya identificado defectos o vicios ocultos en la calidad de los servicios prestados, así como cualquier otra responsabilidad en los términos de este Contrato y convenios modificatorios respectivos.
        </p>
        <p>
            El otorgamiento de anticipo, deberá garantizarse en los términos de los artículos 48, de la “LAASSP”; 81,
            párrafo primero y fracción V, de su Reglamento.
        </p>
        <p>
            Si las disposiciones jurídicas aplicables lo permiten, la entrega de la garantía de anticipo podrá
            realizarse de manera electrónica.
        </p>
        <p>
            Una vez amortizado el cien por ciento del anticipo, el servidor público facultado por “LA DEPENDENCIA O
            ENTIDAD” procederá inmediatamente a extender la constancia de cumplimiento de dicha obligación contractual y
            dará inicio a los trámites para la cancelación de la garantía, lo que comunicará a “EL PROVEEDOR”.
        </p>
    @else
    @endif





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
    document.getElementById('select-proveedor').addEventListener('change', function() {
        var personaSeleccionada = this.value;

        var strongPersonaFisica = document.getElementById('strongPersonaFisica');
        var strongPersonaMoral = document.getElementById('strongPersonaMoral');

        // Obtener los elementos <li> que se deben filtrar
        var personaFisicaLi = document.querySelector('li.esPersonaFisica');
        var personaMoralLi = document.querySelector('li.esPersonaMoral');

        if (personaSeleccionada === 'Persona Fisica') {
            document.getElementById('textoPersonaMoral').style.display = 'none';
            document.getElementById('textoPersonaFisica').style.display = 'block';

            // Actualizar el contenido de los strongs para Persona Física
            strongPersonaFisica.innerHTML = '<strong>“EL PROVEEDOR”</strong> DECLARA QUE:';
            strongPersonaMoral.innerHTML = ''; // Limpiar contenido si es Persona Moral

            // Mostrar el <li> correspondiente a Persona Física y ocultar el de Persona Moral
            personaFisicaLi.style.display = 'block';
            personaMoralLi.style.display = 'none';
        } else if (personaSeleccionada === 'Persona Moral') {
            document.getElementById('textoPersonaFisica').style.display = 'none';
            document.getElementById('textoPersonaMoral').style.display = 'block';

            // Actualizar el contenido de los strongs para Persona Moral
            strongPersonaFisica.innerHTML = ''; // Limpiar contenido si es Persona Física
            strongPersonaMoral.innerHTML =
                '<strong>“EL PROVEEDOR”</strong>, POR CONDUCTO DE SU REPRESENTANTE DECLARA QUE:';

            // Mostrar el <li> correspondiente a Persona Moral y ocultar el de Persona Física
            personaFisicaLi.style.display = 'none';
            personaMoralLi.style.display = 'block';
        } else {
            document.getElementById('textoPersonaFisica').style.display = 'none';
            document.getElementById('textoPersonaMoral').style.display = 'none';

            // Limpiar contenido si no se selecciona ninguna opción
            strongPersonaFisica.innerHTML = '';
            strongPersonaMoral.innerHTML = '';

            // Ocultar ambos <li> si no se selecciona ninguna opción
            personaFisicaLi.style.display = 'none';
            personaMoralLi.style.display = 'none';
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
    document.getElementById('nacionalidad_proveedor').addEventListener('change', function() {
        var nacionalidadSeleccionada = this.value;
        var textoAMostrar = document.getElementById('textoAMostrar');

        if (nacionalidadSeleccionada === 'Mexicana') {
            textoAMostrar.style.display = 'none'; // Oculta el texto si es nacionalidad mexicana
        } else {
            textoAMostrar.style.display = 'block'; // Muestra el texto para otras nacionalidades
        }
    });
</script>
