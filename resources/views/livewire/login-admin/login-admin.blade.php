<div>
    <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to Panel Admin</h2>
            <form wire:submit.prevent="login">

                {{-- Username --}}
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" wire:model.defer="username" class="form-control" placeholder="Username"
                        autocomplete="off">
                    @error('username')
                        <small>
                            <span class="text-danger">{{ $message }}</span>
                        </small>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-2">
                    <label class="form-label">
                        Password
                    </label>
                    <div class="input-group input-group-flat">
                        <input type="password" wire:model.defer="password" class="form-control"
                            placeholder="Your password" autocomplete="off">
                    </div>
                    @error('password')
                        <small>
                            <span class="text-danger">{{ $message }}</span>
                        </small>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-3">
                    <label class="form-check">
                        <input class="form-check-input" type="checkbox" wire:model="remember">
                        <span class="form-check-label">Remember me</span>
                    </label>
                </div>

                {{-- Button Submit --}}
                <div class="form-footer ">
                    <button type="submit" class="btn btn-teal w-100">
                        <span wire:loading wire:target="login" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                        <span wire:loading.remove>Log In</span>
                    </button>
                </div>
            </form>

            {{-- Button Back --}}
            <div class="mt-2">
                <a href="/" wire:navigate style="text-decoration: none;" class="btn btn-outline-secondary w-100">
                    Back
                </a>
            </div>
        </div>
    </div>
</div>
