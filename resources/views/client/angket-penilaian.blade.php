@extends('adminlte::page')
@section('title', 'Input Angket Penilaian Sertifikasi')
@section('content')
    <div class="container">
        <h2>Input Angket Penilaian</h2>
        <hr>
        <div class="col-lg-6 col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <form action="/penilaian/input-angket-penilaian/post" method="post" enctype="multipart/form-data">
                        @csrf
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label>Dokumen Template</label>
                                    <br>
                                    <small class="text-success">Dokumen harus berupa file excel (xls, xslx)</small>
                                    <br>
                                    <input type="file" name="angket_penilaian_doc" class="mt-4">
                                    <br>
                                    @error('angket_penilaian_doc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label>Kategori</label>

                                    <select class="custom-select" name="category_id">
                                        <option value="">Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->categories }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>

        @error('category_id_edit')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        @error('angket_penilaian_doc_edit')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">File</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($categories as $kategori)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $kategori->categories }}</td>
                        <td>
                            @if (isset($kategori->kategoriAngket->angket_penilaian_doc))
                                {{ $kategori->kategoriAngket->angket_penilaian_doc }}
                            @else
                                <span class="badge badge-pill badge-danger">Data Tidak Ada</span>
                            @endif
                        </td>
                        <td>
                            @if (isset($kategori->kategoriAngket->angket_penilaian_doc))
                                <div class="d-flex">
                                    <a href="{{ Storage::url('template_angket/' . $kategori->kategoriAngket->angket_penilaian_doc) }}"
                                        class="btn btn-sm btn-success" target="_blank  ">Preview</a>
                                    <button type="button" class="btn btn-sm btn-info ml-2" id="edit"
                                        data-id="{{ $kategori->kategoriAngket->id }}"
                                        data-angket="{{ $kategori->kategoriAngket->angket_penilaian_doc }}"
                                        data-kategori="{{ $kategori->categories }}">
                                        Edit
                                    </button>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="edit-modal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <form id="edit-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="form-group">
                                        <label>Dokumen Template</label>
                                        <br>
                                        <input type="file" name="angket_penilaian_doc_edit">
                                        <br>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-group">
                                        <label>Kategori</label>

                                        <select class="custom-select" name="category_id_edit">
                                            <option class="old" selected></option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            /**
             * for showing edit item popup
             */

            $(document).on('click', "#edit", function() {
                let id = $(this).data('id');
                let angket = $(this).data('angket');
                let kategori = $(this).data('kategori');
                $('#edit-modal').modal('show');

                var title = $('.modal-title');
                title.html('Ubah Dokumen ' + kategori);

                var oldkategori = $('.old');
                oldkategori.attr('value', id).html(kategori);

                var form = $('#edit-form');
                form.attr('action', '/penilaian/edit-angket-penilaian/edit/' + id)
            })
        })

    </script>
@endsection
