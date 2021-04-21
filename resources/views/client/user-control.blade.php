@extends('adminlte::page')
@section('title', 'User Management')
@section('content')
    <div class="container">
        <h2>User Management</h2>
        <hr>
        {{-- @dump($roles) --}}

        <button type="button" class="btn btn-sm btn-primary add-account mb-2">Tambah Akun</button>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <small>{{ $error }}</small>
            </div>
        @endforeach
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @foreach ($user->roles as $role)
                                <td>{{ Str::ucfirst($role->name) }}</td>
                            @endforeach
                            <td>
                                @if ($user->status == 0)
                                    <span class="badge badge-pill badge-danger">Belum diaktivasi</span>
                                @else
                                    <span class="badge badge-pill badge-success">Sudah diaktivasi</span>
                                @endif
                            </td>
                            <td>
                                <form method="post" action="user-management/delete-user/{{ $user->id }}">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
    <div class="modal fade" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <form method="post" action="add-account/post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).on('click', '.add-account', function() {
            $('.modal').modal('show');
        })

    </script>
@endsection
