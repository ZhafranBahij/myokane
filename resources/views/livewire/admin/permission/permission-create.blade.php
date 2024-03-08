<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Permission Create') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form wire:submit="save">
                        <div class="mb-3">
                          <label for="name" class="form-label text-capitalize">name</label>
                          <input type="text" wire:model.blur="name" class="form-control" id="name" required>
                          <div class="text-danger">@error('name') {{ $message }} @enderror</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
