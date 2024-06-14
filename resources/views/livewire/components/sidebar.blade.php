<div class=" offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header " style="border-bottom:1px solid rgb(221, 221, 221)">
        <a href="#">
            <img src="{{ asset('assets/Logo-Header.png') }}" style="width: 120px;">
        </a>
        {{-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
    </div>
    <div class="offcanvas-body">
        <div class=" container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <b>
                    <li class="nav-item" style="border-bottom:1px solid rgb(221, 221, 221)"">
                        <a class="nav-link" href="/" wire:navigate>Home</a>
                    </li>
                    <li class="nav-item" style="border-bottom:1px solid rgb(221, 221, 221)">
                        <a class="nav-link" href="/prestasi" wire:navigate>Prestasi</a>
                    </li>
                    <li class="nav-item" style="border-bottom:1px solid rgb(221, 221, 221)"dropdown>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kegiatan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/ekstrakulikuler" wire:navigate>Ekstrakulikuler</a></li>
                            <li><a class="dropdown-item" href="/gallery" wire:navigate>Gallery</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" style="border-bottom:1px solid rgb(221, 221, 221)">
                        <a class="nav-link" href="/data-guru" wire:navigate>Data Guru</a>
                    </li>
                    <li class="nav-item" style="border-bottom:1px solid rgb(221, 221, 221)">
                        <a class="nav-link" href="/sarana-prasarana" wire:navigate>Sarana Prasarana</a>
                    </li>
                    <li class="nav-item" style="border-bottom:1px solid rgb(221, 221, 221)">
                        <a class="nav-link" href="/contact" wire:navigate>Contact</a>
                    </li>
                </b>
            </ul>
        </div>
    </div>
</div>
