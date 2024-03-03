<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Users Create') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form wire:submit="save">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" wire:model.blur="name" class="form-control" id="name" required>
                            <div class="text-danger">@error('name') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" wire:model.blur="email" class="form-control" id="email" required>
                          <div class="text-danger">@error('email') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" wire:model.blur="password" class="form-control" id="password" required>
                          <div class="text-danger">@error('password') {{ $message }} @enderror</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
