<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos — {{ $donation->company_name }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #1a1a2e;
            color: #fff;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .toolbar {
            background: #16213e;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #f59e0b;
            flex-shrink: 0;
        }
        .toolbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .toolbar h1 {
            font-size: 15px;
            font-weight: 600;
            color: #f59e0b;
        }
        .toolbar p {
            font-size: 12px;
            color: #94a3b8;
        }
        .toolbar-right {
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-primary { background: #f59e0b; color: #000; }
        .btn-secondary { background: #334155; color: #fff; }
        .btn-success { background: #10b981; color: #fff; }
        .btn:hover { opacity: 0.85; }
        .frames-container {
            display: flex;
            flex: 1;
            gap: 0;
            overflow: hidden;
        }
        .frame-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            border-right: 1px solid #334155;
        }
        .frame-wrapper:last-child { border-right: none; }
        .frame-label {
            background: #0f3460;
            padding: 8px 16px;
            font-size: 12px;
            font-weight: 600;
            color: #e2e8f0;
            border-bottom: 1px solid #334155;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .frame-label span {
            font-size: 11px;
            color: #94a3b8;
            font-weight: 400;
        }
        iframe {
            flex: 1;
            border: none;
            width: 100%;
            height: 100%;
            background: #fff;
        }
    </style>
</head>
<body>
    <div class="toolbar">
        <div class="toolbar-left">
            <div>
                <h1>{{ $donation->company_name }}</h1>
                <p>NIT: {{ $donation->company_nit }} &nbsp;·&nbsp; {{ $donation->sponsor_package }} &nbsp;·&nbsp; {{ $donation->formatted_amount }}</p>
            </div>
        </div>
        <div class="toolbar-right">
            <a class="btn btn-secondary" href="{{ route('donaciones.pdf.certificado', $donation) }}" target="_blank">
                ↓ Certificado PDF
            </a>
            <a class="btn btn-secondary" href="{{ route('donaciones.pdf.soporte', $donation) }}" target="_blank">
                ↓ Documento Soporte PDF
            </a>
            <a class="btn btn-primary" href="javascript:history.back()">← Volver</a>
        </div>
    </div>

    <div class="frames-container">
        <div class="frame-wrapper">
            <div class="frame-label">
                Certificación de Donación
                <span>Año gravable {{ $config->event_year }}</span>
            </div>
            <iframe src="{{ route('donaciones.pdf.certificado', $donation) }}"></iframe>
        </div>
        <div class="frame-wrapper">
            <div class="frame-label">
                Documento Soporte No. {{ str_pad($donation->document_number, 2, '0', STR_PAD_LEFT) }}
                <span>Equivalente a la factura</span>
            </div>
            <iframe src="{{ route('donaciones.pdf.soporte', $donation) }}"></iframe>
        </div>
    </div>
</body>
</html>
