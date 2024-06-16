<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mts Al-Makmur </title>
    <link rel="icon" href="{{ asset('assets/logo.png') }}">

    {{-- Bootstrap --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Login --}}
    <link rel="stylesheet" href="{{ asset('login/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('login/css/bootstrap.min.css') }}">

    {{-- @stack('styles') --}}
    {{-- @livewireStyles --}}
</head>

<body>

    @livewire('login-admin')

    {{-- @stack('scripts') --}}
    {{-- @livewireScripts --}}
    {{-- Login --}}
    <script src="{{ asset('login/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('login/js/popper.min.js') }}"></script>
    <script src="{{ asset('login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('login/js/main.js') }}"></script>

    {{-- Bootstrap --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>

</html>
