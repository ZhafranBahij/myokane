<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Role Edit') }}</div>

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
                        <div class="row mb-3">
                            @foreach ($permissions as $item)
                                <div class="form-check col-3">
                                    <input class="form-check-input" wire:model="permissionSelected" type="checkbox" value="{{ $item->name }}" id="{{ "permission".$item->id }}" checked>
                                    <label class="form-check-label" for="{{ "permission".$item->id }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
