<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Donación</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            padding: 30px 40px;
            line-height: 1.5;
        }
        .header {
            text-align: center;
            margin-bottom: 24px;
        }
        .header h1 {
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.4;
        }
        .body-text {
            text-align: justify;
            margin-bottom: 12px;
        }
        .body-text strong {
            font-weight: bold;
        }
        .list {
            margin-left: 24px;
            margin-bottom: 12px;
        }
        .list li {
            margin-bottom: 6px;
            text-align: justify;
        }
        .city-date {
            margin: 20px 0;
        }
        .signatures {
            display: table;
            width: 100%;
            margin-top: 60px;
        }
        .sig-col {
            display: table-cell;
            width: 50%;
            text-align: center;
            vertical-align: top;
        }
        .sig-line {
            border-top: 1px solid #000;
            width: 200px;
            margin: 0 auto 6px auto;
        }
        .sig-name {
            font-weight: bold;
            font-size: 11px;
            text-transform: uppercase;
        }
        .sig-role {
            font-size: 11px;
        }
        .sig-detail {
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>
            CERTIFICACION DE DONACION EXPEDIDO POR LA {{ strtoupper($config->org_name) }}<br>
            CORRESPONDIENTE AL AÑO GRAVABLE DE {{ $config->event_year }}
        </h1>
    </div>

    <p class="body-text">
        <strong>{{ strtoupper($config->org_rep_name) }}</strong>, identificado con la cédula de ciudadanía número
        {{ $config->org_rep_cc }} expedida en {{ $config->org_rep_cc_city }} en calidad de Representante Legal y
        <strong>{{ strtoupper($config->org_accountant_name) }}</strong> En calidad de Contador Público de la {{ $config->org_name }}
        "{{ $config->org_short_name }}" con Nit {{ $config->org_nit }} en adelante
        "<strong>la asociación de ingenieros de petróleos egresados de la universidad Surcolombiana</strong>",
        entidad sin ánimo de lucro, certificamos:
    </p>

    <p class="body-text">
        Que durante el año {{ $config->event_year }} recibimos de <strong>{{ $donation->company_name }}</strong>,
        con Nit: {{ $donation->company_nit }} la suma de:
        {{ $donation->amount_in_words }} ({{ $donation->formatted_amount }}) a título de donación,
        mediante pago que se adjunta y hace parte integral de esta donación a la cuenta bancaria
        de {{ $config->org_account_type }} No {{ $config->org_bank_account }} del {{ $config->org_bank_name }}.
    </p>

    <ol class="list">
        <li>Que esta entidad no tiene ánimo de lucro y ejerce sus actividades en el Municipio de {{ $config->org_municipality }}</li>
        <li>
            Que su objeto social principal es el siguiente: "Asociar a los Profesionales con título de
            Ingeniero de Petróleos egresados de la Universidad Sur colombiana, fomentar la
            Ingeniería de Petróleos buscando el desarrollo de la profesión entre otros descritos en el objeto.
        </li>
        <li>
            Que la donación recibida se destinará a: la realización del evento denominado
            "<strong>{{ $config->event_edition_number }} SEMANA TÉCNICA DE INGENIERÍA DE PETRÓLEOS</strong>"
        </li>
        <li>
            Que la entidad está inscrita en La Cámara de comercio de {{ $config->org_chamber_city }} quien certifica sobre
            su existencia y representación legal. y se encuentra sometida en su funcionamiento al
            control oficial de la {{ $config->org_control_body }}
        </li>
        <li>Que esta entidad maneja los ingresos por donaciones en depósitos o inversiones en establecimientos financieros autorizados.</li>
    </ol>

    <p class="city-date">{{ $config->event_city }}, {{ \Carbon\Carbon::parse($donation->donation_date)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}</p>

    <div class="signatures">
        <div class="sig-col">
            <div class="sig-line"></div>
            <div class="sig-name">{{ strtoupper($config->org_rep_name) }}</div>
            <div class="sig-role">Representante Legal</div>
        </div>
        <div class="sig-col">
            <div class="sig-line"></div>
            <div class="sig-name">{{ strtoupper($config->org_accountant_name) }}</div>
            <div class="sig-role">Contador Público</div>
            <div class="sig-detail">T.p. {{ $config->org_accountant_tp }} &nbsp; C.c. {{ $config->org_accountant_cc }}</div>
        </div>
    </div>
</body>
</html>
