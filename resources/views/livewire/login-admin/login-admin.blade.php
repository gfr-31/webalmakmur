<div>
    <div class="page page-center ">
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 8v4"></path>
                            <path d="M12 16h.01"></path>
                        </svg>
                    </div>
                    <div>
                        {{ session('error') }}
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @elseif(session()->has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    <div>
                        {{ session('message') }}
                    </div>
                </div>
                <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endif
        <div class="container py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container-tight">
                        <div class="text-center mb-4">
                            <a href="/" wire:navigate class="navbar-brand navbar-brand-autodark">
                                <img src="{{ asset('assets/logo.png') }}" height="90" alt="">
                            </a>
                        </div>
                        <div class="card card-md">
                            <div class="card-body">
                                <h2 class="h2 text-center mb-4">Login to Panel Admin</h2>
                                <form wire:submit.prevent="login">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" wire:model="username" name="username" class="form-control"
                                            placeholder="Username" autocomplete="off">
                                        @error('username')
                                            <small>
                                                <span class="text-danger">{{ $message }}</span>
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">
                                            Password
                                        </label>
                                        <div class="input-group input-group-flat">
                                            <input type="password" wire:model="password" name="password"
                                                class="form-control" placeholder="Your password" autocomplete="off">
                                        </div>
                                        @error('password')
                                            <small>
                                                <span class="text-danger">{{ $message }}</span>
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-footer ">
                                        <button type="submit" class="btn btn-teal w-100">
                                            <span wire:loading wire:target="login"
                                                class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            <span wire:loading.remove>Log In</span>
                                        </button>
                                    </div>
                                </form>
                                <div class=" mt-2">
                                    <a href="/" wire:navigate style="text-decoration: none;">
                                        <button type="button" class="btn btn-outline-secondary w-100">
                                            Back
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg d-none d-lg-block">
                    <img src="{{ asset('assets/Logo-Header.png') }}" height="190" class="d-block mx-auto"
                        alt="">
                </div>
            </div>
        </div>
    </div>
</div>
