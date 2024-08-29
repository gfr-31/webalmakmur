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
                        Edit Gallery
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="/panel-admin/gallery" wire:navigate class="btn btn-dark d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-back-up">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 14l-4 -4l4 -4" />
                                <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                            </svg>
                            Back To Gallery
                        </a>
                        <a href="/panel-admin/gallery" wire:navigate class="btn btn-dark d-sm-none btn-icon"
                            aria-label="Create new report">
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
                                <h4 class="card-title">Form Edit Gallery</h4>
                            </div>
                            <div class="card-body">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <!-- Title -->
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input wire:model="title" type="text" class="form-control"
                                        placeholder="Input Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea wire:model="description" class="form-control w-100" rows="5" placeholder="Input Description"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <!-- Foto -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Foto</h3>
                                            <div class=" col-auto ms-auto d-print-none">
                                                <div class=" btn-list">
                                                    <button type="button" wire:click="showModal"
                                                        class="btn btn-primary d-none d-sm-inline-block">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M12 5l0 14" />
                                                            <path d="M5 12l14 0" />
                                                        </svg>
                                                        Add Foto
                                                    </button>
                                                    <button type="button" wire:click="showModal"
                                                        class=" btn btn-primary d-sm-none btn-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M12 5l0 14" />
                                                            <path d="M5 12l14 0" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group list-group-flush overflow-auto"
                                            style="max-height: 25rem">
                                            @foreach ($currentFoto as $index => $photo)
                                                <div class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <a data-fslightbox="gallery-{{ $index }}"
                                                                href="{{ asset('uploads/gallery/' . $photo['filename']) }}">
                                                                <div class="avatar">
                                                                    <img class=" rounded rounded-2"
                                                                        src="{{ asset('uploads/gallery/' . $photo['filename']) }}"
                                                                        alt="" srcset="">
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col text-truncate">
                                                            <a style="text-decoration: none"
                                                                class="text-body d-block">{{ $photo['filename'] }}</a>
                                                            <div class="text-secondary text-truncate mt-n1">
                                                                {{ $photo['date'] ?? 'Data tidak ada' }}
                                                            </div>
                                                        </div>
                                                        <div class="col-auto ml-auto text-truncate ">
                                                            <button type="button"
                                                                wire:click="deleteFoto('{{ $photo['key'] }}')"
                                                                class="btn btn-outline-youtube btn-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none" />
                                                                    <path d="M4 7l16 0" />
                                                                    <path d="M10 11l0 6" />
                                                                    <path d="M14 11l0 6" />
                                                                    <path
                                                                        d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                    <path
                                                                        d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @error('foto')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="card-footer text-end">
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary ms-auto">
                                            Update data
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('tabler/dist/libs/fslightbox/index.js') }}" defer></script>

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

    <script>
        window.addEventListener('show-modal', event => {
            var modal = new bootstrap.Modal(document.getElementById('modal-report'));
            modal.show();
        });

        window.addEventListener('close-modal', event => {
            var modal = bootstrap.Modal.getInstance(document.getElementById('modal-report'))
            modal.hide()
        })
    </script>

    <!-- Modal -->
    <div wire:ignore.self class="modal modal-blur fade" id="modal-report" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Isi Modal -->
                    <div class="mb-3">
                        <label class="form-label">Add Foto</label>
                        <input type="file" wire:model="foto" class="form-control" multiple id="fileInput">
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary"
                        data-bs-dismiss="modal">Cancel</button>
                    <button id="submitButton" type="button" class="btn btn-primary"
                        wire:click="addFoto">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>
