<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Panel Admin Al Makmur' }}</title>
    <link rel="icon" href="{{ asset('assets/logo.png') }}">
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('tabler/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/demo.min.css') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    {{-- @livewireStyles --}}
</head>

<body>
    <div class="page">
        @livewire('admin.components.navbar')
        @livewire('admin.components.header')
        <div class="page-wrapper">
            {{ $slot }}
            @livewire('admin.components.footer')
        </div>
    </div>

    {{-- @livewireScripts --}}
    <script src="{{ asset('tabler/dist/js/demo-theme.min.js') }}"></script>
    <!-- Libs JS -->
    <script src=" {{ asset('tabler/dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src=" {{ asset('tabler/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src=" {{ asset('tabler/dist/js/tabler.min.js') }}" defer></script>
    <script src=" {{ asset('tabler/dist/js/demo.min.js') }}" defer></script>

</body>

</html>
