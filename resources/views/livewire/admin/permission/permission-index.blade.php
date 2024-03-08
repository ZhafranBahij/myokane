<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Permission') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <a href="{{ route('permissions.create') }}"  class="btn btn-primary" wire:navigate>
                        Add Permission +
                    </a>

                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text" id="basic-addon1">Search</span>
                        <input type="text"  wire:model.live="search" class="form-control" placeholder="search..." aria-describedby="basic-addon1">
                      </div>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Action</th>
                            <th scope="col">Permission</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($permissions as $key => $item)
                            <tr>
                                <th scope="row"> {{ ++$key }} </th>
                                <td>
                                    <a href="{{ route('permissions.edit', $item->id) }}" type="button" class="btn btn-warning" wire:navigate wire:loading.attr="disabled">Edit</a>
                                    <button type="button" class="btn btn-danger" wire:click="delete({{ $item->id }})" wire:confirm="Are you serious want to delete?" wire:loading.attr="disabled">Delete</button>
                                </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td> {{ $item->updated_at }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                      {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
