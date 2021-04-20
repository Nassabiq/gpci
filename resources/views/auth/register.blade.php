@extends('layouts.app')

@section('content')
    <div class="container con">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card text-center border-dark login-card shadow">
                    <div class="card-body">
                        <h1 class="title">REGISTRATION</h1>
                        <p class="subtitle pb-4">GREEN PRODUCT COUNCIL INDONESIA</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="group-register mt-3">
                                <input class="input-auth" id="name" type="text" name="name" value="{{ old('name') }}"
                                    required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">Nama Perusahaan</label>
                                @error('name')
                                    <span><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="group-register mt-3">
                                <input class="input-auth" id="email" type="email" name="email" value="{{ old('email') }}"
                                    required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">Email</label>
                                @error('email')
                                    <span><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="group-register mt-3">
                                <input class="input-auth" id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                    required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">No. Telp / WhatsApp</label>
                                @error('phone')
                                    <span><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="group-register mt-3">
                                <input class="input-auth" id="password" type="password" name="password" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">Password</label>
                                @error('password')
                                    <span><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="group-register mt-3">
                                <input class="input-auth" id="password" type="password" name="password_confirmation"
                                    required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">Ulangi Password</label>
                            </div>


                            <button type="submit" class="btn btn-auth border-dark px-5 shadow mb-4">
                                <strong>
                                    REGISTER
                                </strong>
                            </button>

                        </form>
                        <a href="{{ route('login') }}" class="register">
                            Klik Disini untuk Melakukan Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
