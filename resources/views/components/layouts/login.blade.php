<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title ?? 'MTS Al Makmur' }}</title>
    <link rel="icon" href="{{ asset('assets/logo.png') }}">
    <meta name="msapplication-TileColor" content="#0054a6" />
    <meta name="theme-color" content="#0054a6" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!" />
    <meta name="canonical" content="https://tabler.io/demo/sign-in-illustration.html">
    <meta name="twitter:image:src" content="https://tabler.io/demo/static/og.png">
    <meta name="twitter:site" content="@tabler_ui">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title"
        content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
    <meta name="twitter:description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">
    <meta property="og:image" content="https://tabler.io/demo/static/og.png">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="640">
    <meta property="og:site_name" content="Tabler">
    <meta property="og:type" content="object">
    <meta property="og:title"
        content="Tabler: Premium and Open Source dashboard template with responsive and high quality UI.">
    <meta property="og:url" content="https://tabler.io/demo/static/og.png">
    <meta property="og:description"
        content="Tabler comes with tons of well-designed components and features. Start your adventure with Tabler and make your dashboard great again. For free!">

    {{-- @stack('styles') --}}
    <!-- CSS files -->
    <link href="{{ asset('tabler/dist/css/tabler.min.css?1695847769') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-flags.min.css?1695847769') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-payments.min.css?1695847769') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/tabler-vendors.min.css?1695847769') }}" rel="stylesheet" />
    <link href="{{ asset('tabler/dist/css/demo.min.css?1695847769') }}" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    @livewireStyles
</head>

<body class=" d-flex flex-column ">

    <div>
        <div class="page page-center">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l5 5l10 -10"></path>
                            </svg>
                        </div>
                        <div>
                            {{ session('message') }}
                        </div>
                    </div>
                    <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                </div>
            @endif
            <div class="container py-4">
                <div class="row align-items-center g-4">
                    <div class="col-lg">
                        <div class="container-tight">
                            <div class="text-center mb-4">
                                <a href="/" wire:navigate class="navbar-brand navbar-brand-autodark">
                                    <img src="{{ asset('assets/logo.png') }}" height="90" alt="">
                                </a>
                            </div>
                            {{ $slot }}
                        </div>
                    </div>
                    <div class="col-lg d-none d-lg-block">
                        <img src="{{ asset('assets/Logo-Header.png') }}" height="190" class="d-block mx-auto"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    @livewireScripts
    <!-- Tabler Core -->
    <script src="{{ asset('tabler/dist/js/demo-theme.min.js?1695847769') }}"></script>
    <script src="{{ asset('tabler/dist/js/tabler.min.js?1695847769') }}" defer></script>
    <script src="{{ asset('tabler/dist/js/demo.min.js?1695847769') }}" defer></script>

</body>

</html>
