@extends('adminlte::page')
@section('title', 'Input Data Sertifikasi')
@section('content')
    <div class="container">
        {{-- <h1>Input</h1> --}}
        @php
            // dd($company);
        @endphp
        @livewire('wizard')

    </div>
@endsection
