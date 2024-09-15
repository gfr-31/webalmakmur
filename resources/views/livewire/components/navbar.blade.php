<div>
    <nav class="navbar navbar-expand-md sticky-top d-print-none">
        <div class=" container-xl">
            <button class="navbar-toggler" id="navbar-toggler" type="button" data-bs-toggle="collapse"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-x d-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                </span>
            </button>

            <h1 class="navbar-brand  d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="/" wire:navigate style="text-decoration: none">
                    <img src="{{ asset('assets/logo.png') }}" width="110" height="32" alt="Tabler"
                        class="navbar-brand-image">
                    <small>
                        <span>MTS Al Makmur</span>
                    </small>
                </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item d-none d-md-flex me-3">
                    <div class="btn-list">
                        <a href="" class="btn btn-outline-facebook" target="_blank" rel="noreferrer">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-facebook -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3">
                                </path>
                            </svg>
                            Facebook
                        </a>
                        <a href="#" class="btn btn-outline-instagram" target="_blank" rel="noreferrer">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-instagram -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z">
                                </path>
                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                <path d="M16.5 7.5l0 .01"></path>
                            </svg>
                            Instagram
                        </a>
                        <a href="#" class="btn btn-outline-youtube " target="_blank" rel="noreferrer">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-youtube -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z">
                                </path>
                                <path d="M10 9l5 3l-5 3z"></path>
                            </svg>
                            Youtube
                        </a>
                        <a href="#" class="btn btn-outline-github" target="_blank" rel="noreferrer">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                            </svg>
                            Twitter
                        </a>
                    </div>
                </div>
                <div class=" d-flex d-md-flex" style="">
                    <a href="?theme=dark" wire:navigate class=" nav-link px-0 hide-theme-dark"
                        title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                    </a>
                    <a href="?theme=light" wire:navigate class="nav-link px-0 hide-theme-light"
                        title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path
                                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </a>
                </div>
                <div class=" d-flex d-md-flex" style="">
                    <a href="/panel-admin" wire:navigate class="nav-link px-0 " title="Panel Admin"
                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-device-laptop">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 19l18 0" />
                            <path d="M5 6m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar-expand-md">
        <div id="navbar-menu" class="collapse navbar-collapse ">
            <div class="navbar">
                <div class=" container-xl">
                    <div class="row flex-fill align-items-center">
                        <div class="col">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/" wire:navigate>
                                        <span
                                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Home
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/prestasi" wire:navigate>
                                        <span
                                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-trophy">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M8 21l8 0" />
                                                <path d="M12 17l0 4" />
                                                <path d="M7 4l10 0" />
                                                <path d="M17 4v8a5 5 0 0 1 -10 0v-8" />
                                                <path d="M5 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M19 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Prestasi
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/ekstrakulikuler" wire:navigate>
                                        <span
                                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-swords">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M21 3v5l-11 9l-4 4l-3 -3l4 -4l9 -11z" />
                                                <path d="M5 13l6 6" />
                                                <path d="M14.32 17.32l3.68 3.68l3 -3l-3.365 -3.365" />
                                                <path d="M10 5.5l-2 -2.5h-5v5l3 2.5" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Ekstrakulikuler
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/gallery" wire:navigate>
                                        <span
                                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-camera">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                                <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Gallery
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/data-guru" wire:navigate>
                                        <span
                                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Data Guru
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/sarana-prasarana" wire:navigate>
                                        <span
                                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-building-community">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                                <path d="M13 7l0 .01" />
                                                <path d="M17 7l0 .01" />
                                                <path d="M17 11l0 .01" />
                                                <path d="M17 15l0 .01" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Sarana Prasarana
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact" wire:navigate>
                                        <span
                                            class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-bubble-text">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 10h10" />
                                                <path d="M9 14h5" />
                                                <path
                                                    d="M12.4 3a5.34 5.34 0 0 1 4.906 3.239a5.333 5.333 0 0 1 -1.195 10.6a4.26 4.26 0 0 1 -5.28 1.863l-3.831 2.298v-3.134a2.668 2.668 0 0 1 -1.795 -3.773a4.8 4.8 0 0 1 2.908 -8.933a5.33 5.33 0 0 1 4.287 -2.16" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Contact
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        document.querySelector('#navbar-toggler').addEventListener('click', function() {
            const navbarMenu = document.querySelector('#navbar-menu');
            navbarMenu.classList.toggle('show');

            document.querySelector('.navbar-toggler-icon').classList.toggle('d-none');
            document.querySelector('.navbar-toggler-x').classList.toggle('d-none');
        });
    </script>
</div>
