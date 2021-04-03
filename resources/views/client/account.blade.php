@extends('adminlte::page')
@section('title', 'Account')
@section('content')
    <div class="container">
        <h2>{{ Str::ucfirst($user->name) }}</h2>
        <small class="text-secondary" style="letter-spacing: 2px">
            {{ $user->email }}
        </small>
        <button type="button" class="btn btn-sm btn-warning float-right changePassword">Ubah Password</button>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('error') }}
            </div>
        @endif
        @if (Hash::check('gpci12345', $user->password))
            <div class="alert alert-danger mb-2 col-6" role="alert">
                Akun anda masih menggunakan password default, harap ubah password demi keamanan akun anda
            </div>
        @endif
        <ul class="list-group col-6">
            @foreach ($user->roles as $role)
                @if ($role->name !== 'client')
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Role User
                        <span class="badge badge-primary badge-pill">
                            {{ $role->name }}
                        </span>
                    </li>
                @endif
            @endforeach
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Tgl Terdaftar
                <span class="badge badge-primary badge-pill">
                    {{ \Carbon\Carbon::parse($user->created_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                </span>
            </li>
        </ul>
    </div>

    <div class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form action="/account/edit" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Old Password</label>

                            <div class="col-md-6">
                                <input id="old-password" type="password"
                                    class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                    required>

                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                    required>

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                                Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="new_password_confirmation" required>
                                @error('new_password_confirmation')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).on('click', '.changePassword', function() {
            $('.modal').modal('show');
        })

    </script>
    @if (count($errors) > 0)
        <script type="text/javascript">
            $('.modal').modal('show');

        </script>
    @endif
@endsection
