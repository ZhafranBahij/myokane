<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Outcomes Create') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form wire:submit="save">
                        <div class="mb-3">
                          <label for="value" class="form-label text-capitalize">Value</label>
                          <input type="text" wire:model.blur="value" class="form-control" id="value" required>
                          <div class="text-danger">@error('value') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label text-capitalize">description</label>
                          <textarea wire:model.blur="description"  id="" cols="5" rows="10" class="form-control"></textarea>
                          <div class="text-danger">@error('description') {{ $message }} @enderror</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
