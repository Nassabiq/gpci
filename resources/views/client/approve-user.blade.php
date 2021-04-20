@extends('adminlte::page')
@section('title', 'Approve User')
@section('content')
    <div class="container">
        <h2>Approve User</h2>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Tgl Mendaftar</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($user as $item)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        @foreach ($item->roles as $role)
                            <td>{{ Str::ucfirst($role->name) }}</td>
                        @endforeach
                        <td>
                            @if ($item->status == 0)
                                <span class="badge badge-pill badge-danger">Belum diaktivasi</span>
                            @else
                                <span class="badge badge-pill badge-success">Sudah diaktivasi</span>
                            @endif
                        </td>
                        <td>
                            {{ $item->phone }}
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}
                        </td>
                        <td>
                            @if ($item->status == 0)
                                <button type="submit" class="btn btn-sm btn-primary showModal" data-id="{{ $item->id }}"
                                    data-name="{{ $item->name }}">
                                    Approve
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $user->links() }}
        </div>
    </div>
    <div class="modal fade" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog">
            <form method="post" id="approveUser">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Approve Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Approve akun ini?
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
        $(document).on('click', '.showModal', function() {
            let id = $(this).data('id');
            let nama = $(this).data('name');
            var form = $('#approveUser');
            $('.modal').modal('show');

            form.attr('action', '/user/approve-user/' + id)
        })

    </script>
@endsection
