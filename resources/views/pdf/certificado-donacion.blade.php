<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Donación</title>

    <style>
        @page {
            margin: 1cm 2.3cm;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12.5px;
            line-height: 1.45;
            color: #000;
            margin: 0;
        }

        .document {
            width: 100%;
        }

        .logo {
            text-align: center;
            margin-bottom: 5px;
        }

        .logo img {
            width: 200px;
            height: auto;
        }

        .title {
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            line-height: 1.35;
            margin-bottom: 20px;
        }

        p {
            margin: 0 0 12px 0;
            text-align: justify;
        }

        .list {
            margin: 8px 0 14px 20px;
            padding-left: 14px;
        }

        .list li {
            margin-bottom: 8px;
            text-align: justify;
        }

        .city-date {
            margin-top: 16px;
            margin-bottom: 40px;
        }

        .signatures {
            width: 100%;
        }

        table.signature-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top: 50px;
        }

        table.signature-table td {
            width: 50%;
            vertical-align: top;
        }

        .signature-name {
            font-weight: bold;
            text-transform: uppercase;
        }

        .signature-role {
            margin-top: 2px;
        }

        .signature-extra {
            margin-top: 2px;
        }

        .left-signature {
            padding-right: 30px;
        }

        .right-signature {
            padding-left: 30px;
        }
    </style>
</head>

<body>
@php
    // 🔥 Recomendado: usar PNG en lugar de WEBP para PDFs
    $logoPath = public_path('assets/images/logo.webp');
    $logoBase64 = file_exists($logoPath) ? base64_encode(file_get_contents($logoPath)) : null;
@endphp

<div class="document">

    {{-- LOGO --}}
    @if($logoBase64)
        <div class="logo">
            <img src="data:image/png;base64,{{ $logoBase64 }}" alt="Logo">
        </div>
    @endif

    {{-- TITULO --}}
    <div class="title">
        CERTIFICACION DE DONACION EXPEDIDO POR LA {{ strtoupper($config->org_name) }}<br>
        CORRESPONDIENTE AL AÑO GRAVABLE DE {{ $config->event_year }}
    </div>

    {{-- INTRO --}}
    <p>
        <strong>{{ strtoupper($config->org_rep_name) }}</strong>, identificado con la cédula de ciudadanía número
        {{ $config->org_rep_cc }} expedida en {{ $config->org_rep_cc_city }} en calidad de Representante Legal y
        <strong>{{ strtoupper($config->org_accountant_name) }}</strong> en calidad de Contador Público de la
        {{ strtoupper($config->org_name) }} “{{ strtoupper($config->org_short_name) }}”
        con Nit {{ $config->org_nit }} en adelante
        “la asociación de ingenieros de petróleos egresados de la universidad Surcolombiana”,
        entidad sin ánimo de lucro, certificamos:
    </p>

    {{-- CONTENIDO --}}
    <p>
        Que durante el año {{ $config->event_year }} recibimos de
        <strong>{{ strtoupper($donation->company_name) }}</strong>,
        con Nit: {{ $donation->company_nit }} la suma de:
        {{ $donation->amount_in_words }} ({{ $donation->formatted_amount }})
        a título de donación, mediante pago que se adjunta y hace parte integral de esta donación
        a la cuenta bancaria de {{ $config->org_account_type }}
        No {{ $config->org_bank_account }} del {{ $config->org_bank_name }}.
    </p>

    {{-- LISTA --}}
    <ol class="list">
        <li>
            Que esta entidad no tiene ánimo de lucro y ejerce sus actividades en el Municipio de
            {{ $config->org_municipality }}.
        </li>
        <li>
            Que su objeto social principal es el siguiente: “Asociar a los Profesionales con título de
            Ingeniero de Petróleos egresados de la Universidad Surcolombiana, fomentar la Ingeniería de Petróleos
            buscando el desarrollo de la profesión entre otros descritos en el objeto.”
        </li>
        <li>
            Que la donación recibida se destinará a: la realización del evento denominado
            “{{ $config->event_edition_number }} SEMANA TÉCNICA DE INGENIERÍA DE PETRÓLEOS”.
        </li>
        <li>
            Que la entidad está inscrita en la Cámara de comercio de {{ $config->org_chamber_city }},
            quien certifica sobre su existencia y representación legal, y se encuentra sometida en su funcionamiento
            al control oficial de la {{ $config->org_control_body }}.
        </li>
        <li>
            Que esta entidad maneja los ingresos por donaciones en depósitos o inversiones en
            establecimientos financieros autorizados.
        </li>
    </ol>

    {{-- FECHA --}}
    <p class="city-date">
        {{ $config->event_city }},
        {{ \Carbon\Carbon::parse($donation->donation_date)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
    </p>

    {{-- FIRMAS --}}
    <div class="signatures">
        <table class="signature-table">
            <tr>
                <td class="left-signature">
                    <p class="signature-name">{{ strtoupper($config->org_rep_name) }}</p>
                    <p class="signature-role">Representante Legal</p>
                </td>
                <td class="right-signature">
                    <p class="signature-name">{{ strtoupper($config->org_accountant_name) }}</p>
                    <p class="signature-role">Contador Público</p>
                    <p class="signature-extra">
                        T.p. {{ $config->org_accountant_tp }}
                        C.c. {{ $config->org_accountant_cc }}
                    </p>
                </td>
            </tr>
        </table>
    </div>

</div>

</body>
</html>