@extends('adminlte::page')
@section('title', 'Add Kategori Produk')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2>Kategori Produk</h2>
            <button class="btn btn-sm btn-primary addKategori" data-title="Tambah Kategori">Tambah Kategori</button>
        </div>
        <hr>
        @error('categories')
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ $message }}
            </div>
        @enderror
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $category->categories }}</td>
                        <td>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-success editKategori" data-title="Edit Kategori"
                                    data-id="{{ $category->id }}" data-value="{{ $category->categories }}">Edit</button>
                                <button class="btn btn-sm btn-danger ml-2 deleteKategori"
                                    data-id="{{ $category->id }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $categories->links() }}
        </div>

    </div>

    <div class="modal fade" tabindex="-1" id="addEdit">
        <div class="modal-dialog">
            <form method="post" id="form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" name="categories" id="input">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="deleteKategori">
        <div class="modal-dialog">
            <form method="post" id="form-delete">
                @csrf
                <div class="modal-content">
                    <div class="modal-body">
                        Apakah anda ingin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).on('click', '.addKategori', function(event) {
            event.preventDefault();
            let title = $(this).data('title');
            let form = $('#form');
            $('#addEdit').modal('show');

            form.attr('action', '/import/kategori-produk/post');
            $('#title').html(title);

            // /import/kategori-produk/post
        });

        $(document).on('click', '.editKategori', function(event) {
            event.preventDefault();
            let id = $(this).data('id');
            let title = $(this).data('title');
            let value = $(this).data('value');
            let form = $('#form');
            let input = $('#input');
            $('#addEdit').modal('show');

            form.attr('action', '/import/kategori-produk/' + id + '/edit');
            $('#title').html(title);
            input.val(value);

            // /import/kategori-produk/post
        });
        $(document).on('click', '.deleteKategori', function(event) {
            event.preventDefault();
            let id = $(this).data('id');
            let form = $('#form-delete');
            $('#deleteKategori').modal('show');

            form.attr('action', '/import/kategori-produk/' + id + '/delete');

            // /import/kategori-produk/post
        });

    </script>
@endsection
