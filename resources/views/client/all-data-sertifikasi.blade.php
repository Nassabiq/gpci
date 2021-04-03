@extends('adminlte::page')
@section('title', 'Input Data Sertifikasi')
@section('content')
    <div class="container">
        {{-- @livewire('wizard-plant') --}}
        <h2>Data Sertifikasi</h2>
        <hr>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($company as $item)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $item->nama_perusahaan }}</td>
                        <td>{{ $item->alamat_perusahaan }}</td>
                        <td>{{ $item->email_perusahaan }}</td>
                        <td>
                            <a href="{{ url('/sertifikasi/data-sertifikasi/' . $item->id) }}"
                                class="btn btn-sm btn-primary">Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
