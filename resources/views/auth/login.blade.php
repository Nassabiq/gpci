@extends('layouts.app')

@section('content')
    <div class="container con">
        <div class="row justify-content-center align-self-center">
            <div class="col-lg-6 col-12 ">
                <div class="text-center shadow card border-dark login-card">
                    <div class="card-body">
                        <img src="{{ asset('img/gpci.png') }}" alt="" class="mb-3 logo">
                        <h1 class="title">CLIENT PORTAL</h1>
                        <p class="pb-4 subtitle">GREEN PRODUCT COUNCIL INDONESIA</p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mt-3 group">
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

                            <button type="submit" class="px-5 mb-4 shadow btn btn-auth border-dark">
                                <strong>
                                    LOGIN
                                </strong>
                            </button>
                        </form>
                        <div class="mx-4 row justify-content-between">
                            <a href="{{ route('register') }}" class="align-middle register">
                                Pendaftaran Sertifikasi
                            </a>
                            <a href="#" class="flex register">
                                <i class="fab fa-whatsapp"></i>
                                <span>
                                    Contact Us
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
