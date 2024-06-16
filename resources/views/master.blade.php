<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mts Al-Makmur </title>
    <link rel="icon" href="{{ asset('assets/logo.png') }}">

    {{-- @stack('styles') --}}
    @livewireStyles

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('styles/home.css') }}">
</head>

<body>
    @livewire('components.header')
    @livewire('components.navbar')
    @livewire('components.sidebar')
    <main>
        @yield('home')
        @yield('prestasi')
        @yield('eskul')
        @yield('galery')
        @yield('data-guru')
        @yield('sapras')
        @yield('contact')
    </main>

    {{-- @include('livewire.components.footer') --}}

    {{-- @stack('scripts') --}}
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
