@extends('adminlte::page')
@section('title', 'Penilaian Sertifikasi')
@section('content')
    <div class="container">

        <h2>Penilaian Sertifikasi</h2>
        <hr>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Pabrik</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ $product->pabrik->perusahaan->nama_perusahaan }}</td>
                        <td>{{ $product->pabrik->nama_fasilitas }}</td>
                        <td>
                            @if ($product->status == 1)
                                <span class="badge badge-pill badge-danger">Belum Diverifikasi</span>
                            @elseif($product->status == 2)
                                <span class="badge badge-pill badge-warning">Sedang Diverifikasi</span>
                            @elseif($product->status == 3)
                                <span class="badge badge-pill badge-success">Terverifikasi</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/penilaian/penilaian-sertifikasi/' . $product->id) }}"
                                class="btn btn-sm btn-primary">Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
