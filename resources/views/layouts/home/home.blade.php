@extends('master')

{{-- @section('home') --}}
@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none ">
        <div class=" container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Page
                    </div>
                    <h2 class="page-title">
                        Home
                    </h2>
                </div>
                <!-- Page title actions -->
                {{-- <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <span class="d-none d-sm-inline">
                        <a href="#" class="btn">
                            New view
                        </a>
                    </span>
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                        data-bs-toggle="modal" data-bs-target="#modal-report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Create new report
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                        data-bs-target="#modal-report" aria-label="Create new report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                    </a>
                </div>
            </div> --}}
            </div>
        </div>
    </div>
    
    <!-- Page body -->
    <div class="page-body ">
        <section id="carousel">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active image-container" data-bs-interval="5000">
                        <img src="{{ asset('assets/apa.jpg') }}" class=" d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item image-container" data-bs-interval="5000">
                        <img src="{{ asset('assets/gedung.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item image-container" data-bs-interval="5000">
                        <img src="{{ asset('assets/Paskibra.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <marquee id="marquee" style="background-color: rgb(245, 245, 245)" behavior="" direction="">Selamat
            Datang Di Website
            Sekolah MTs Al Makmur | Kp. Mekar Mulya Rt.
            004/004 Desa Parungpanjang Kec. Parungpanjang Kab. Bogor (16360)
        </marquee>

        <section id="visimisi" style="background-color: #3d9970">
            <div id="vs" class=" container-fluid mt-5">
                <div class=" row">
                    <div class=" col" id="col-1">
                        <div class="row mx-2 rounded-3">
                            <div
                                class=" col d-flex justify-content-center align-items-center image-zoom-container rounded-4">
                                <img src="{{ asset('assets/garuda2.jpg') }}" width="320px" height="400px" alt=""
                                    srcset="" class="zoomable ">
                            </div>
                            <div
                                class=" col d-flex justify-content-center align-items-center image-zoom-container rounded-4">
                                <img src="{{ asset('assets/Putsal1.jpg') }}" width="320px" height="400px" alt=""
                                    srcset="" class="zoomable ">
                            </div>
                        </div>
                    </div>
                    <div class=" col" id="bagian2">
                        <p id="judul">Islamic Junio High School</p>
                        <h1>Visi & Misi</h1>
                        <p id="visi">
                            <b>Visi</b> MTS Al-Makmur Parungpanjang yaitu:
                            <b>"Terwujudnya Lulusan yang Mandiri, Aktif, Kreatif,Mulia, Unggul dan Religius
                                (MAKMUR)"</b>
                        </p>
                        <p id="misi">
                            <b>Misi</b> MTS Al-Makmur Parungpanjang yaitu:
                            <b>Memberikan layanan pendidikan untuk menghasilkan lulusan yang aktif, kreatif dan mandiri
                                Menjadikan lulusan yang Unggul dalam Prestasi akademik dan non akademik Mewujudkan insan
                                yang mulia dan religius</b>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            123
        </section>
    </div>
@endsection
