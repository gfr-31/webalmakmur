<div>
    @if (session()->has('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @elseif(session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2 mb-3 "
                    style=" display: flex; align-items: center; justify-content: center;">
                    {{-- <img src="{{ asset('login/images/undraw_file_sync_ot38.svg') }}" alt="Image" class="img-fluid"> --}}
                    <img src="{{ asset('assets/Logo-Header.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-1">
                                <h3>Log In to <strong>Panel Admin</strong></h3>
                                <p class="mb-2">This is The corpse Panel Admin login page for Islamic Junior Hight
                                    School
                                </p>
                            </div>
                            <form wire:submit.prevent="login">
                                <div class=" first">
                                    {{-- <label for="username" class=" form-label">Username</label> --}}
                                    <input type="text" class="form-control  border-bottom text-center "
                                        id="username" placeholder="Username" wire:model="username">
                                    @error('username')
                                        <small>
                                            <span class="text-danger">{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class=" last mb-4">
                                    {{-- <label for="password">Password</label> --}}
                                    <input type="{{ $showPassword ? 'text' : 'password' }}"
                                        class="form-control border-bottom text-center " id="password"
                                        wire:model="password"
                                        placeholder="{{ $showPassword ? 'Password' : '********' }}">
                                    @error('password')
                                        <small>
                                            <span class="text-danger">{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="d-flex mb-4 align-items-center">
                                    <label class="control control--checkbox mb-0">
                                        <span class="caption">
                                            {{ $showPassword ? 'Hide' : 'Show' }} Pass
                                        </span>
                                        <input type="checkbox" wire:click="showPass" />
                                        <div class="control__indicator"></div>
                                    </label>
                                </div>
                                <button type="submit" class="button btn text-white btn-block mb-1"
                                    style="background-color: #3d9970">
                                    <span wire:loading wire:target="login" class="spinner-border spinner-border-sm"
                                        role="status" aria-hidden="true"></span>
                                    <span wire:loading.remove>Log In</span>
                                </button>
                                <a href="/" wire:navigate style="text-decoration: none;">
                                    <button type="button" class="button btn text-white btn-block"
                                        style="background-color: #b3b3b3;">
                                        <span wire:loading wire:target="navigate"
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        <span wire:loading.remove><i class="fa-solid fa-reply"></i> Back</span>
                                    </button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
