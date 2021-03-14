@extends('adminlte::page')
@section('title', 'Dokumen Sertifikasi')
@section('content')
    @livewire('upload-document')
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        })

    </script>
@endsection
