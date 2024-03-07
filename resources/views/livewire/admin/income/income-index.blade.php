<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Income') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="mb-3">
                        Total Saldo : {{ $total_saldo }}
                    </div>

                    <a href="{{ route('incomes.create') }}"  class="btn btn-primary" wire:navigate>
                        Add Income +
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
                            <th scope="col">User</th>
                            <th scope="col">Value</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($incomes as $item)
                            <tr>
                                <th scope="row"> {{ $item->id }} </th>
                                <td>
                                    <a href="{{ route('incomes.edit', $item->id) }}" type="button" class="btn btn-warning" wire:navigate wire:loading.attr="disabled">Edit</a>
                                    <button type="button" class="btn btn-danger" wire:click="delete({{ $item->id }})" wire:confirm="Are you serious want to delete?" wire:loading.attr="disabled">Delete</button>
                                </td>
                                <td> {{ $item->user->name }} </td>
                                <td> Rp. {{ number_format($item->value, 0, ',', '.') }}</td>
                                <td> {{ $item->description }} </td>
                                <td> {{ $item->date }} </td>
                                <td> {{ $item->created_at }} </td>
                                <td> {{ $item->updated_at }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                      {{ $incomes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
