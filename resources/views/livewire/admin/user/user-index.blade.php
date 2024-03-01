<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href=""  class="btn btn-primary">
                        Add User +
                    </a>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Action</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            {{-- <th scope="col">Handle</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <th scope="row"> {{ $item->id }} </th>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->email }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
