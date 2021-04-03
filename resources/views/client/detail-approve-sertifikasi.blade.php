@extends('adminlte::page')
@section('title', 'Detail Penilaian Sertifikasi')
@section('content')
    <div class="container">
        @livewire('approve-sertifikasi', ['product'=> $product->id])
    </div>
@endsection
