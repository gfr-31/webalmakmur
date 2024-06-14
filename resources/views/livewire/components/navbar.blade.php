@push('styles')
    @livewireStyles
@endpush
@push('scripts')
    @livewireScripts
@endpush

<nav class="navbar navbar-expand-lg border-top border-end-0 border-start-0" id="navbar">
    <div class="container my-3">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/" wire:navigate>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/prestasi" wire:navigate>Prestasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Kegiatan
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/ekstrakulikuler" wire:navigate>Ekstrakulikuler</a></li>
                            <li><a class="dropdown-item" href="/gallery" wire:navigate>Gallery</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/data-guru" wire:navigate>Data Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sarana-prasarana" wire:navigate>Sarana
                            Prasarana</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact" wire:navigate>Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto"> <!-- Menggunakan kelas ml-auto untuk memindahkan ke kanan -->
                    <li class="nav-item">
                        <a class="nav-link" href="login-admin" wire:navigate><i class="fa-solid fa-user"></i> Panel
                            Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

{{-- Mobile --}}
<nav class="navbar">
    <div id="menu-sidebar" class="">
        <div class="p-2 my-2 d-flex justify-content-between">
            <a href="#" wire:click.prevent="linkTo('home')">
                <img src="{{ asset('assets/Logo-Header.png') }}" style="width: 150px;">
            </a>

            <div id="sosmed">
                <div>
                    <ul style=" list-style-type: none; display:flex" class=" m-auto">
                        <li>
                            <a href="https://www.facebook.com" class="fb-button" target="_blank">
                                <i class=" fa-brands fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="fb-button" target="_blank">
                                <i class="fa-brands fa-square-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="fb-button" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="fb-button" target="_blank">
                                <i class="fa-brands fa-square-x-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="tm" class="">
                <div style="display: flex">
                    <div class="px-1" style="display: flex; ">
                        <div class="px-3">
                            <img width="44" height="44" src="{{ asset('assets/icons8-telephone-64.png') }}"
                                alt="phone" />
                        </div>
                        <div class=" ">
                            <small style="margin: 0;padding:0">Telephone</small>
                            <p style="margin: 0;padding:0"><b>0812335446</b></p>
                        </div>
                    </div>
                    <div class=" mx-4" style="border-left: 2px solid black"></div>
                    <div class="  px-1 " style="display: flex; ">
                        <div class="  px-3">
                            <img width="44" height="44" src="{{ asset('assets/icons8-email-100.png') }}"
                                alt="phone" />
                        </div>
                        <div class=" ">
                            <small style="margin: 0;padding:0">Email</small>
                            <p style="margin: 0;padding:0"><b>mtsalmakmur@gmail.com</b></p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="border rounded">
                    <button class="btn " type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tangkap semua item menu di dalam sidebar
        var sidebarLinks = document.querySelectorAll('.offcanvas .nav-link');

        // Tambahkan event listener untuk setiap item menu
        sidebarLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // Sematkan offcanvas
                var offcanvas = document.getElementById('offcanvasExample');
                var offcanvasBS = new bootstrap.Offcanvas(offcanvas);

                // Sembunyikan offcanvas
                offcanvasBS.hide();
            });
        });
    });
</script>
