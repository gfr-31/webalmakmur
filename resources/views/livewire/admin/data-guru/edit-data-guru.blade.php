<div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Page
                    </div>
                    <h2 class="page-title">
                        Update Data Guru
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="/panel-admin/data-guru" wire:navigate class="btn btn-dark d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 14l-4 -4l4 -4" />
                                <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                            </svg>
                            Back To Data Guru
                        </a>
                        <a href="/panel-admin/data-guru" wire:navigate class="btn btn-dark d-sm-none btn-icon">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 14l-4 -4l4 -4" />
                                <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Page Body --}}
    <div class=" page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class=" card">
                        <form wire:submit.prevent="update" class="card" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Form Data Guru</h4>
                            </div>
                            <div class="card-body">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <!-- Name -->
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input wire:model="name" type="text" class="form-control"
                                        placeholder="Input Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Position -->
                                <div class="mb-3">
                                    <label class="form-label">Position</label>
                                    <input wire:model="position" type="text" class="form-control"
                                        placeholder="Input Position">
                                    @error('position')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                {{-- Relegion --}}
                                <div class="mb-3">
                                    <div wire:ignore>
                                        <label class="form-label">Relegion</label>
                                        <select wire:model="relegion" id="select-user" placeholder="Choose a Religion">
                                            {{-- <option value=""></option> --}}
                                            <option value="Islam" @if ($this->relegion === 'Islam') selected @endif>
                                                Islam
                                            </option>
                                            <option value="Kristen Protestan"
                                                @if ($this->relegion === 'Kristen Protestan') selected @endif>
                                                Kristen Protestan
                                            </option>
                                            <option value="Kristen Katolik"
                                                @if ($this->relegion === 'Kristen Katolik') selected @endif>
                                                Kristen Katolik
                                            </option>
                                            <option value="Hindu" @if ($this->relegion === 'Hindu') selected @endif>
                                                Hindu
                                            </option>
                                            <option value="Budha" @if ($this->relegion === 'Budha') selected @endif>
                                                Budha
                                            </option>
                                            <option value="Konghucu" @if ($this->relegion === 'Konghucu') selected @endif>
                                                Konghucu
                                            </option>
                                        </select>
                                    </div>
                                    @error('relegion')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Gender --}}
                                <div class="mb-3">
                                    <div class=" d-flex">
                                        <div class="form-label" style="margin-right: 20px">Gender : </div>
                                        <label class="form-check form-check-inline">
                                            <input wire:model="gender" class="form-check-input" type="radio"
                                                name="radios-inline" value="L">
                                            <span class="form-check-label">Male</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input wire:model="gender" class="form-check-input" type="radio"
                                                name="radios-inline" value="P">
                                            <span class="form-check-label">Female</span>
                                        </label>
                                    </div>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Foto -->
                                <div class="mb-3">
                                    <label class="form-label">Foto</label>
                                    <div class=" input-group">
                                        <input wire:model="foto" type="file" class=" form-control" id="fotoInput">
                                        <label class="input-group-text"
                                            for="fotoInput">{{ $currentFoto ? $currentFoto : 'Choose file' }}</label>
                                    </div>
                                    @error('foto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary ms-auto" style="min-width: 100px;"
                                        id="submitButton">
                                        <span wire:loading wire:target="update"
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"> </span>
                                        <span wire:loading.remove wire:target="update">
                                            Send data
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            new TomSelect('#select-user', {
                create: false, // Bisa menambahkan opsi baru atau tidak
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        </script>
        <script>
            document.getElementById('fotoInput').addEventListener('change', function() {
                var fileName = this.files[0].name;
                var nextSibling = this.nextElementSibling;
                nextSibling.innerText = fileName;
                document.getElementById('submitButton').disabled = true;
            });
        </script>
    @endpush
</div>
