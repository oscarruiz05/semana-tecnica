<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Documento Soporte</title>
    <style>
        @page {
            margin: 1.4cm 1.6cm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #111;
            margin: 0;
            padding: 0;
            font-size: 11px;
            line-height: 1.2;
        }

        .page {
            width: 100%;
        }

        .section-bar {
            width: 100%;
            background: #d8e6f5;
            border-top: 1px solid #222;
            border-bottom: 1px solid #222;
            text-align: center;
            font-weight: bold;
            font-size: 10px;
            padding: 4px 8px;
            margin-bottom: 8px;
        }

        .buyer-block {
            width: 100%;
            border-top: 1px solid #222;
            border-bottom: 1px solid #222;
            padding: 10px 0 12px 0;
            margin-bottom: 6px;
        }

        .buyer-table {
            width: 100%;
            border-collapse: collapse;
        }

        .buyer-table td {
            vertical-align: middle;
        }

        .buyer-logo {
            width: 18%;
            text-align: center;
        }

        .buyer-logo img {
            width: 95px;
            height: auto;
        }

        .buyer-info {
            width: 82%;
            text-align: center;
            font-weight: bold;
            color: #111;
        }

        .buyer-name {
            font-size: 24px;
            line-height: 1.1;
            font-weight: 700;
        }

        .buyer-nit {
            margin-top: 2px;
            font-size: 18px;
            font-weight: 700;
        }

        .seller-wrap {
            width: 100%;
            margin-bottom: 6px;
        }

        .seller-table {
            width: 100%;
            border-collapse: collapse;
        }

        .seller-table td {
            vertical-align: top;
        }

        .seller-left {
            width: 60%;
            padding: 6px 8px 4px 8px;
        }

        .seller-right {
            width: 40%;
            padding: 18px 0 0 8px;
        }

        .line {
            margin-bottom: 2px;
            font-size: 11px;
            font-weight: bold;
        }

        .line.big {
            font-size: 14px;
        }

        .doc-box {
            border: 1px solid #222;
            border-radius: 16px;
            text-align: center;
            padding: 14px 10px;
            min-height: 82px;
            font-weight: bold;
        }

        .doc-box-title {
            font-size: 11px;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        .doc-box-number {
            font-size: 17px;
            font-weight: 700;
        }

        .detail-header {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 2px;
        }

        .detail-header th {
            border: 1px solid #222;
            padding: 8px 6px;
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            background: #fff;
        }

        .detail-header th:first-child {
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
        }

        .detail-header th:last-child {
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        .detail-body {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2px;
        }

        .detail-body td {
            border: 1px solid #222;
            vertical-align: top;
            padding: 8px 8px;
            font-size: 11px;
        }

        .desc-cell {
            width: 60%;
            height: 280px;
            text-align: justify;
            line-height: 1.35;
            font-size: 12px;
        }

        .money-cell {
            width: 14%;
            text-align: center;
            font-size: 12px;
            padding-top: 16px !important;
        }

        .qty-cell {
            width: 11%;
            text-align: center;
            font-size: 12px;
            padding-top: 16px !important;
        }

        .total-cell {
            width: 15%;
            text-align: center;
            font-size: 12px;
            padding-top: 16px !important;
        }

        .summary-wrap {
            width: 100%;
            margin-top: 0;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary-table td {
            vertical-align: top;
        }

        .son-box-wrap {
            width: 60%;
            padding-right: 8px;
        }

        .son-box {
            border: 1px solid #222;
            border-radius: 16px;
            min-height: 78px;
            padding: 22px 14px;
            font-size: 13px;
            font-weight: bold;
        }

        .totals-wrap {
            width: 40%;
        }

        .totals-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }

        .totals-table td {
            padding: 1px 4px;
            vertical-align: middle;
        }

        .totals-head {
            font-weight: bold;
        }

        .mini-box {
            border: 1px solid #222;
            text-align: center;
            font-weight: bold;
            min-width: 70px;
        }

        .mini-box.blank {
            font-weight: normal;
        }

        .signatures {
            width: 100%;
            border-top: 1px solid #222;
            border-bottom: 1px solid #222;
            margin-top: 14px;
            padding: 8px 0 10px 0;
        }

        .signatures-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 8px 0;
        }

        .signatures-table td {
            width: 50%;
            vertical-align: top;
        }

        .sign-box {
            border: 1px solid #222;
            border-radius: 16px;
            /* min-height: 88px; */
            min-height: 110px;
            padding: 10px 14px;
            font-size: 11px;
            font-weight: bold;
        }

        .sign-label {
            margin-bottom: 6px;
            font-size: 11px;
        }

        .sign-name {
            font-size: 11px;
            margin-top: 4px;
        }

        .signature-image {
            height: 34px;
            margin: 2px 0 4px 0;
        }

        .signature-image img {
            max-height: 34px;
            width: auto;
        }

        .bold-inline {
            font-weight: 700;
        }
    </style>
</head>
<body>
@php
    $logoPath = public_path('assets/images/logo.webp');
    $logoBase64 = file_exists($logoPath) ? base64_encode(file_get_contents($logoPath)) : null;

    $signaturePath = public_path('assets/images/signature.png');
    $signatureBase64 = file_exists($signaturePath) ? base64_encode(file_get_contents($signaturePath)) : null;
@endphp

<div class="page">

    <div class="section-bar">
        INFORMACION DEL COMPRADOR (Agente Retenedor)
    </div>

    <div class="buyer-block">
        <table class="buyer-table">
            <tr>
                <td class="buyer-logo">
                    @if($logoBase64)
                        <img src="data:image/png;base64,{{ $logoBase64 }}" alt="Logo">
                    @endif
                </td>
                <td class="buyer-info">
                    <div class="buyer-name">
                        {{ $config->org_name }} ({{ strtoupper($config->org_short_name) }})
                    </div>
                    <div class="buyer-nit">
                        Nit: {{ $config->org_nit }}
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="section-bar">
        INFORMACION DE LA PERSONA NATURAL (Vendedor-Contribuyente)
    </div>

    <div class="seller-wrap">
        <table class="seller-table">
            <tr>
                <td class="seller-left">
                    <div class="line big">
                        NOMBRES Y APELLIDOS COMPLETOS:
                        <span class="bold-inline">{{ strtoupper($donation->company_name) }}</span>
                    </div>
                    <div class="line">NIT: {{ $donation->company_nit }}</div>
                    <div class="line">DIRECCION: {{ $donation->company_address }}</div>
                    <div class="line">CORREO ELECTRÓNICO: {{ $donation->company_email }}</div>
                    <div class="line">TELEFONO: {{ $donation->company_phone }}</div>
                    <div class="line">CIUDAD: {{ $donation->company_city }}</div>
                    <div class="line">FECHA: {{ \Carbon\Carbon::parse($donation->donation_date)->format('d/m/Y') }}</div>
                    <div class="line">ACTIVIDAD ECONÓMICA PRINCIPAL: {{ $donation->company_economic_activity }}</div>
                </td>
                <td class="seller-right">
                    <div class="doc-box">
                        <div class="doc-box-title">
                            DOCUMENTO SOPORTE -EQUIVALENTE A LA FACTURA
                        </div>
                        <div class="doc-box-number">
                            No.&nbsp;&nbsp;{{ str_pad($donation->document_number, 2, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <table class="detail-header">
        <tr>
            <th style="width:60%;">DESCRIPCIÓN Y/O CONCEPTO</th>
            <th style="width:14%;">VR. UNITARIO</th>
            <th style="width:11%;">CANTIDAD</th>
            <th style="width:15%;">VR. TOTAL</th>
        </tr>
    </table>

    <table class="detail-body">
        <tr>
            <td class="desc-cell">
                Aporte extraordinario a la {{ $config->org_name }} ({{ strtoupper($config->org_short_name) }}),
                como donacion que da derecho al paquete <strong>{{ strtoupper($donation->sponsorPackage?->name ?? '') }}</strong>
                de la {{ $config->event_edition_roman }} semana Tecnica internacional a realizarce del
                {{ \Carbon\Carbon::parse($config->event_dates_from)->locale('es')->isoFormat('D') }}
                al
                {{ \Carbon\Carbon::parse($config->event_dates_to)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
                en la ciudad de {{ $config->event_city }}

                <br><br>

                Se adjunta certificiacion de aporte extraordinario y documentos legales
                {{ strtoupper($config->org_short_name) }}
            </td>
            <td class="money-cell">
                {{ number_format($donation->amount, 0, ',', '.') }}
            </td>
            <td class="qty-cell">
                1
            </td>
            <td class="total-cell">
                {{ number_format($donation->amount, 0, ',', '.') }}
            </td>
        </tr>
    </table>

    <div class="summary-wrap">
        <table class="summary-table">
            <tr>
                <td class="son-box-wrap">
                    <div class="son-box">
                        SON:&nbsp; {{ $donation->amount_in_words }}
                    </div>
                </td>
                <td class="totals-wrap">
                    <table class="totals-table">
                        <tr>
                            <td class="totals-head" style="width:36%; text-align:right;">TOTALES</td>
                            <td class="totals-head" style="width:8%; text-align:center;">$</td>
                            <td class="totals-head" style="width:26%; text-align:right;">{{ number_format($donation->amount, 0, ',', '.') }}</td>
                            <td class="totals-head" style="width:8%; text-align:center;">1</td>
                            <td class="mini-box" style="width:22%;">$ {{ number_format($donation->amount, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;">Valor Venta</td>
                            <td class="mini-box blank">${{ number_format($donation->amount, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;">Retefuente</td>
                            <td class="mini-box blank"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;">Reteica</td>
                            <td class="mini-box blank"></td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align:right;">Valor pagado</td>
                            <td class="mini-box">${{ number_format($donation->amount, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <div class="signatures">
        <table class="signatures-table">
            <tr>
                <td>
                    <div class="sign-box">
                        <div class="sign-label">V.O.B.</div>
                        <div class="signature-image">
                            @if($signatureBase64)
                                <img src="data:image/png;base64,{{ $signatureBase64 }}" alt="Firma">
                            @endif
                        </div>
                    </div>
                </td>
                <td>
                    <div class="sign-box">
                        <div class="sign-label">FIRMA:</div>
                        <div class="signature-image">
                            @if($signatureBase64)
                                <img src="data:image/png;base64,{{ $signatureBase64 }}" alt="Firma">
                            @endif
                        </div>
                        <div class="sign-name">{{ $donation->signer_name }}</div>
                        @if($donation->signer_role)
                            <div class="sign-name">{{ $donation->signer_role }}</div>
                        @endif
                        @if($donation->signer_cc)
                            <div class="sign-name">C.C. {{ $donation->signer_cc }}</div>
                        @endif
                    </div>
                </td>
            </tr>
        </table>
    </div>

</div>
</body>
</html>