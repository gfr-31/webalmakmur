<div>
    {{-- @dump($select)
    @dump($firstId)
    @dump($selectAll) --}}
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Page
                    </div>
                    <div class=" d-flex">

                        <h2 class="page-title" style="margin-right: 10px">
                            Gallery
                        </h2>
                    </div>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="/panel-admin/gallery/add-gallery" wire:navigate
                            class="btn btn-dark d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Create New Data
                        </a>
                        <a href="/panel-admin/gallery/add-gallery" wire:navigate class="btn btn-dark d-sm-none btn-icon"
                            data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
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
            <div class="card">
                <div class="card-body border-bottom py-3">
                    <div class="d-flex ">
                        @if ($select)
                            <div class=" text-secondary">
                                Delete All Data:
                                <div class=" ms-2 d-inline-block">
                                    <button wire:click="deleteAll('')" class="btn btn-outline-youtube btn-icon"
                                        aria-label="Youtube">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/brand-youtube -->
                                        <span wire:loading wire:target="deleteAll"
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        <svg wire:loading.remove wire:target="deleteAll"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="text-secondary ">
                                Show
                                <div class="ms-2 d-inline-block">
                                    {{-- <input wire:model.live.debounce.400ms="entries" type="number"
                                            class="form-control" min="1" placeholder="10" > --}}
                                    <select wire:model.live.debounce.400ms="entries" class="form-select">
                                        <option value="1">1</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="75">75</option>
                                        <option value="100">100</option>
                                        {{-- <option value="all">All</option> --}}
                                    </select>
                                </div>
                                entries
                            </div>
                        @endif
                        <div class="text-secondary ms-auto">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input wire:model.live.debounce.300ms="search" type="text" class="form-control"
                                    placeholder=" Search....">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th class="w-1">
                                        <input wire:model.live="selectAll" class="form-check-input m-0 align-middle"
                                            type="checkbox" aria-label="Select all invoices">
                                        <input type="hidden" wire:model.live="firstId"
                                            value="{{ $gallery && $gallery->isNotEmpty() ? $gallery->first()->id : 0 }}">
                                    </th>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class=" text-center">foto</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th class="w-1 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($gallery->isNotEmpty())
                                    <?php $no = 1; ?>
                                    @foreach ($gallery as $g)
                                        <tr>
                                            <td>
                                                <input wire:key="{{ $g->id }}" value="{{ $g->id }}"
                                                    wire:model.live="select" class="form-check-input m-0 align-middle"
                                                    type="checkbox" aria-label="Select invoice"
                                                    {{ $select ? 'checked' : '' }}>
                                            </td>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $g->judul }}</td>
                                            <td>{{ $g->description }}</td>
                                            <td class=" text-center">
                                                @if ($g->foto === [])
                                                    Tidak Ada Foto
                                                @else
                                                    @php
                                                        $photos = is_string($g->foto)
                                                            ? json_decode($g->foto, true)
                                                            : $g->foto;
                                                        $firstPhoto = $photos[0];
                                                    @endphp
                                                    <a data-fslightbox="gallery-{{ $g->id }}"
                                                        href="{{ asset('uploads/gallery/' . $firstPhoto['filename']) }}">
                                                        <div class="avatar">
                                                            <img class=" rounded rounded-2"
                                                                src="{{ asset('uploads/gallery/' . $firstPhoto['filename']) }}"
                                                                alt="" srcset="">
                                                        </div>
                                                    </a>
                                                    @foreach ($photos as $photo)
                                                        @if ($loop->first)
                                                            @continue
                                                        @endif
                                                        <a data-fslightbox="gallery-{{ $g->id }}"
                                                            href="{{ asset('uploads/gallery/' . $photo['filename']) }}"
                                                            class="d-none">
                                                            <p>{{ $photo['filename'] }}</p>
                                                        </a>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>{{ $g->created_at }}</td>
                                            <td>{{ $g->updated_at ?? '----------' }}</td>
                                            <td wire:key="gallery-{{ $g->id }}">
                                                <div class="btn-list flex-nowrap">
                                                    <a wire:navigate
                                                        href="/panel-admin/gallery/{{ $g->id }}/edit-gallery"
                                                        class="btn btn-outline-facebook btn-icon"
                                                        aria-label="Facebook">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                            <path
                                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                            <path d="M16 5l3 3" />
                                                        </svg>
                                                    </a>
                                                    <button wire:click="delete({{ $g->id }})"
                                                        class="btn btn-outline-youtube btn-icon" aria-label="Youtube">
                                                        <span wire:loading wire:target="delete({{ $g->id }})"
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        <svg wire:loading.remove
                                                            wire:target="delete({{ $g->id }})"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M4 7l16 0" />
                                                            <path d="M10 11l0 6" />
                                                            <path d="M14 11l0 6" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">
                                            <div class="alert alert-important alert-danger alert-dismissible"
                                                role="alert">
                                                <div class="d-flex justify-content-center">
                                                    <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon alert-icon" width="24" height="24"
                                                            viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                            </path>
                                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                            <path d="M12 8v4"></path>
                                                            <path d="M12 16h.01"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        Sorry, data is empty......
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class=" m-2">
                    {{ $gallery->links() }}
                    @push('js')
                        <script src="{{ asset('tabler/dist/libs/fslightbox/index.js') }}" defer></script>
                        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
                            crossorigin="anonymous"></script>
                        <script>
                            $(".page-item").on('click', function(event) {
                                Livewire.dispatch('resetMySelected')
                            })
                        </script>
                        <script>
                            window.addEventListener('load', function() {
                                const url = new URL(window.location.href);
                                if (url.searchParams.has('page') && url.searchParams.get('page') !== '1') {
                                    url.searchParams.set('page', '1');
                                    window.location.href = url.href;
                                } else if (url.searchParams.has('page')) {
                                    url.searchParams.delete('page');
                                    window.history.replaceState({}, document.title, url.pathname);
                                }
                            });
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</div>
