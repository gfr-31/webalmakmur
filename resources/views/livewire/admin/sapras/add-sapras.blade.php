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
                        Add Sarana Prasarana
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="/panel-admin/sarana-prasarana" wire:navigate
                            class="btn btn-dark d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 14l-4 -4l4 -4" />
                                <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                            </svg>
                            Back To Sarana Prasarana
                        </a>
                        <a href="/panel-admin/sarana-prasarana" wire:navigate class="btn btn-dark d-sm-none btn-icon"
                            data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
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
                        <form wire:submit.prevent="add" class="card" enctype="multipart/form-data" id="uploadForm">
                            @csrf
                            <div class="card-header">
                                <h4 class="card-title">Form Sarana Prasarana</h4>
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

                                {{-- Condition --}}
                                <div class="mb-3">
                                    <div wire:ignore>
                                        <label class="form-label">Condition</label>
                                        <select wire:model="condition" id="select-user"
                                            placeholder="Choose a Condition">
                                            <option value=""></option>
                                            <option value="Baik">Baik</option>
                                            <option value="Rusak Ringan">Rusak Ringan</option>
                                            <option value="Rusak Sedang">Rusak Sedang</option>
                                            <option value="Rusak Berat">Rusak Berat</option>
                                        </select>
                                    </div>
                                    @error('condition')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Total --}}
                                <div class="mb-3">
                                    <label class="form-label">Total</label>
                                    <input wire:model="total" type="number" class="form-control"
                                        placeholder="Input Total">
                                    @error('total')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Foto -->
                                <div class="mb-3">
                                    <label class="form-label">Foto</label>
                                    <input wire:model="foto" type="file" class="form-control"
                                        placeholder="Input Foto" multiple id="fileInput">
                                    @error('foto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary ms-auto" id="submitButton"
                                        style="min-width: 100px;">
                                        <span wire:loading wire:target="add" class="spinner-border spinner-border-sm"
                                            role="status" aria-hidden="true"> </span>
                                        <span wire:loading.remove wire:target="add">
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
            document.addEventListener('DOMContentLoaded', function() {
                const fileInput = document.getElementById('fileInput');
                const submitButton = document.getElementById('submitButton');

                fileInput.addEventListener('change', function() {
                    if (fileInput.files.length > 0) {
                        submitButton.disabled = false;
                    } else {
                        submitButton.disabled = true;
                    }
                });
            });
        </script>
        <script>
            document.getElementById('fileInput').addEventListener('change', function() {
                var fileName = this.files[0].name;
                var nextSibling = this.nextElementSibling;
                nextSibling.innerText = fileName;
                document.getElementById('submitButton').disabled = true;
            });
        </script>
    @endpush
</div>
