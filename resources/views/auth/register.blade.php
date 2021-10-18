@extends('layouts.app')

@section('content')
    <div class="container con">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-12">
                <div class="text-center shadow card border-dark login-card">
                    <div class="card-body">
                        <h1 class="title">REGISTRATION</h1>
                        <p class="pb-4 subtitle">GREEN PRODUCT COUNCIL INDONESIA</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mt-3 group-register">
                                <input class="input-auth" id="name" type="text" name="name" value="{{ old('name') }}"
                                    required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">Nama Perusahaan</label>
                                @error('name')
                                    <span><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mt-3 group-register">
                                <input class="input-auth" id="email" type="email" name="email" value="{{ old('email') }}"
                                    required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">Email</label>
                                @error('email')
                                    <span><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mt-3 group-register">
                                <input class="input-auth" id="phone" type="text" name="phone" value="{{ old('phone') }}"
                                    required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">No. Telp / WhatsApp</label>
                                @error('phone')
                                    <span><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mt-3 group-register">
                                <input class="input-auth" id="password" type="password" name="password" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">Password</label>
                                @error('password')
                                    <span><strong class="text-danger">{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="mt-3 group-register">
                                <input class="input-auth" id="password_confirmation" type="password"
                                    name="password_confirmation" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label class="label-auth">Ulangi Password</label>
                            </div>


                            <button type="submit" class="px-5 mb-4 shadow btn btn-auth border-dark">
                                <strong>
                                    REGISTER
                                </strong>
                            </button>

                        </form>
                        <div class="mx-4 row justify-content-between">
                            <a href="{{ route('login') }}" class="register">
                                Login Disini
                            </a>
                            <a href="https://wa.me/send/?phone=6281212937770" class="flex register">
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
