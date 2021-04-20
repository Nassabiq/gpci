@extends('layouts.app')

@section('content')
    <div class="container con">
        <div class="row justify-content-center align-self-center">
            <div class="col-md-6">
                <div class="card text-center border-dark login-card shadow">
                    <div class="card-body">
                        <img src="{{ asset('img/gpci.png') }}" alt="" class="logo mb-3">
                        <h1 class="title">CLIENT PORTAL</h1>
                        <p class="subtitle pb-4">GREEN PRODUCT COUNCIL INDONESIA</p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="group mt-3">
                                <input class="input-auth" id="email" type="email" name="email" value="{{ old('email') }}"
                                    required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">Alamat Email</label>
                                @error('email')
                                    <span><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="group">
                                <input class="input-auth" id="password" type="password" name="password" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">Password</label>
                                @error('password')
                                    <span><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            @error('status')
                                <div class="alert alert-danger alert-auth" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror

                            @if (session()->has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <button type="submit" class="btn btn-auth border-dark px-5 shadow mb-4">
                                <strong>
                                    LOGIN
                                </strong>
                            </button>
                        </form>

                        <a href="{{ route('register') }}" class="register">
                            Klik Disini untuk Pendaftaran Sertifikasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
