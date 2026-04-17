<!DOCTYPE html>
<html class="dark" lang="es">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="robots" content="index, follow">
    <meta name="description" content="Participa en la Semana Técnica Internacional de Petróleo y Gas en la USCO. Conferencias, networking y expertos del sector energético.">
    <meta name="keywords" content="petróleo y gas, evento petrolero, ingeniería de petróleos, USCO, semana técnica">
    <title>13 Semana Técnica Internacional de Petróleo y Gas | USCO</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    @stack('styles')
</head>
<body class="font-body selection:bg-primary selection:text-on-primary">

<!-- Top Navigation Shell -->
@include('layout.header')

@yield('content')

<!-- Footer Shell -->
@include('layout.footer')

<!-- Back to Top -->
<button id="back-to-top" onclick="window.scrollTo({top:0,behavior:'smooth'})">
    <span class="material-symbols-outlined">keyboard_arrow_up</span>
</button>

<script src="{{ asset('assets/js/index.js') }}" defer></script>

@stack('scripts')
</body>
</html>
