<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento Soporte</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #000;
            padding: 20px 30px;
        }
        table { width: 100%; border-collapse: collapse; }
        .header-table td { padding: 4px 6px; }
        .border-table td, .border-table th {
            border: 1px solid #000;
            padding: 5px 8px;
        }
        .section-title {
            background-color: #333;
            color: #fff;
            font-weight: bold;
            text-align: center;
            font-size: 11px;
            padding: 5px;
        }
        .org-title {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
            line-height: 1.4;
            margin: 8px 0;
        }
        .doc-number {
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            padding: 4px;
        }
        .label { font-weight: bold; }
        .items-header {
            background-color: #555;
            color: #fff;
            font-weight: bold;
            text-align: center;
            font-size: 11px;
        }
        .totals-label { font-weight: bold; font-size: 12px; }
        .totals-value { text-align: right; font-weight: bold; }
        .amount-words { font-size: 12px; font-weight: bold; }
        .signature-row td { padding-top: 8px; font-size: 11px; }
    </style>
</head>
<body>

    {{-- Cabecera: organización y número de documento --}}
    <table class="border-table" style="margin-bottom:0;">
        <tr>
            <td style="width:70%; vertical-align:middle;">
                <div class="org-title">
                    {{ $config->org_name }}<br>({{ $config->org_short_name }})<br>
                    Nit: {{ $config->org_nit }}
                </div>
            </td>
            <td style="width:30%; vertical-align:middle; text-align:center; border-left:1px solid #000;">
                <div style="font-weight:bold; font-size:11px;">DOCUMENTO SOPORTE - EQUIVALENTE A LA FACTURA</div>
                <div class="doc-number">No. {{ str_pad($donation->document_number, 2, '0', STR_PAD_LEFT) }}</div>
            </td>
        </tr>
    </table>

    {{-- Sección: Comprador (Agente Retenedor) --}}
    <table class="border-table" style="margin-top:-1px;">
        <tr>
            <td colspan="4" class="section-title">INFORMACION DEL COMPRADOR (Agente Retenedor)</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center; font-weight:bold; padding:4px;">
                {{ $config->org_name }} ({{ $config->org_short_name }}) — Nit: {{ $config->org_nit }}
            </td>
        </tr>
    </table>

    {{-- Sección: Vendedor/Contribuyente --}}
    <table class="border-table" style="margin-top:-1px;">
        <tr>
            <td colspan="4" class="section-title">INFORMACION DE LA PERSONA NATURAL (Vendedor-Contribuyente)</td>
        </tr>
        <tr>
            <td colspan="2"><span class="label">NOMBRES Y APELLIDOS COMPLETOS:</span> {{ $donation->company_name }}</td>
            <td colspan="2"><span class="label">NIT:</span> {{ $donation->company_nit }}</td>
        </tr>
        <tr>
            <td colspan="2"><span class="label">DIRECCIÓN:</span> {{ $donation->company_address }}</td>
            <td><span class="label">TELÉFONO:</span> {{ $donation->company_phone }}</td>
            <td><span class="label">CIUDAD:</span> {{ $donation->company_city }}</td>
        </tr>
        <tr>
            <td colspan="2"><span class="label">CORREO ELECTRÓNICO:</span> {{ $donation->company_email }}</td>
            <td colspan="2"><span class="label">FECHA:</span> {{ \Carbon\Carbon::parse($donation->donation_date)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td colspan="4"><span class="label">ACTIVIDAD ECONÓMICA PRINCIPAL:</span> {{ $donation->company_economic_activity }}</td>
        </tr>
    </table>

    {{-- Tabla de ítems --}}
    <table class="border-table" style="margin-top:-1px;">
        <thead>
            <tr>
                <th class="items-header" style="width:55%;">DESCRIPCIÓN Y/O CONCEPTO</th>
                <th class="items-header" style="width:15%;">VR. UNITARIO</th>
                <th class="items-header" style="width:15%;">CANTIDAD</th>
                <th class="items-header" style="width:15%;">VR. TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="vertical-align:top; padding:8px;">
                    Aporte extraordinario a la {{ $config->org_name }} ({{ $config->org_short_name }}),
                    como donación que da derecho al paquete <strong>{{ $donation->sponsor_package }}</strong>
                    de la {{ $config->event_edition_roman }} Semana Técnica Internacional a realizarse del
                    {{ \Carbon\Carbon::parse($config->event_dates_from)->locale('es')->isoFormat('D') }} al
                    {{ \Carbon\Carbon::parse($config->event_dates_to)->locale('es')->isoFormat('D [de] MMMM [de] YYYY') }}
                    en la ciudad de {{ $config->event_city }}.
                    <br><br>
                    Se adjunta certificación de aporte extraordinario y documentos legales {{ $config->org_short_name }}
                </td>
                <td style="text-align:right; vertical-align:top; padding:8px;">
                    {{ number_format($donation->amount, 0, ',', '.') }}
                </td>
                <td style="text-align:center; vertical-align:top; padding:8px;">1</td>
                <td style="text-align:right; vertical-align:top; padding:8px;">
                    {{ number_format($donation->amount, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    {{-- Totales --}}
    <table class="border-table" style="margin-top:-1px;">
        <tr>
            <td style="width:50%;" rowspan="4">
                <div class="amount-words">SON: {{ $donation->amount_in_words }}</div>
            </td>
            <td style="width:25%; text-align:right;"><span class="label">TOTALES</span></td>
            <td style="width:25%; text-align:right;">$ {{ number_format($donation->amount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="text-align:right;">Valor Venta</td>
            <td style="text-align:right;">${{ number_format($donation->amount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="text-align:right;">Retefuente</td>
            <td style="text-align:right;"></td>
        </tr>
        <tr>
            <td style="text-align:right;">Valor pagado</td>
            <td style="text-align:right; font-weight:bold;">${{ number_format($donation->amount, 0, ',', '.') }}</td>
        </tr>
    </table>

    {{-- Firmas --}}
    <table class="border-table" style="margin-top:-1px;">
        <tr class="signature-row">
            <td style="width:50%;">
                <div style="margin-bottom:24px;">VO.B.</div>
                <div>___________________________</div>
            </td>
            <td style="width:50%;">
                <div style="margin-bottom:24px;">FIRMA:</div>
                <div>{{ $donation->signer_name }}</div>
                @if($donation->signer_role)
                    <div>{{ $donation->signer_role }}</div>
                @endif
                @if($donation->signer_cc)
                    <div>C.C. {{ $donation->signer_cc }}</div>
                @endif
            </td>
        </tr>
    </table>

</body>
</html>
