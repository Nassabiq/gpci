@extends('adminlte::page')
@section('title', 'Detail Penilaian Sertifikasi')
@section('content')
    <div class="container">
        @livewire('detail-penilaian', ['product'=> $product->id])

    </div>
@endsection
