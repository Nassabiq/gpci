<div>
    <h2>Checklist Dokumen </h2>
    <hr>

    <div class="d-flex mb-2 justify-content-between">
        <div class="col-3">
            <select class="custom-select" wire:model="kategori">
                <option value="">Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->categories }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary btn-sm" wire:click.prevent="add()">Tambah Dokumen</button>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Dokumen</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($docs as $doc)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $doc->nama_dokumen }}</td>
                    <td>{{ $doc->kategoriProduk->categories }}</td>
                    <td>
                        @if ($doc->kategoriProduk->id !== 100)
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary btn-sm"
                                    wire:click.prevent="edit({{ $doc }})">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm ml-2"
                                    wire:click="delete({{ $doc->id }})">Delete</button>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="addDokumen" tabindex="-1" wire:ignore.self data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <form autocomplete="off" wire:submit.prevent="{{ $updateMode ? 'editDokumen' : 'addDokumen' }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            @if ($updateMode)
                                <span>Edit Checklist Dokumen</span>
                            @else
                                <span>Tambah Checklist Dokumen</span>
                            @endif
                        </h5>
                        <button type="button" class="close" wire:click.prevent="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            @if ($updateMode)
                                <input type="hidden" wire:model="doc_id">
                            @endif
                            <label>Nama Dokumen</label>
                            <input class="form-control" type="text" placeholder="Nama Dokumen"
                                wire:model="nama_dokumen">
                            @error('nama_dokumen') <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Kategori Dokumen</label>
                            <select class="custom-select" wire:model="kategori_input">
                                <option value="">Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->categories }}</option>
                                @endforeach
                            </select>
                            @error('kategori_input') <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click.prevent="close">Close</button>
                        <button type="submit" class="btn btn-primary">
                            @if ($updateMode)
                                <span>Edit</span>
                            @else
                                <span>Save</span>
                            @endif
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@section('js')
    <script>
        window.addEventListener('hide-modal', () => {
            $('.modal').modal('hide');
            $('.modal-backdrop').remove();
        });

    </script>
    <script>
        window.addEventListener('show-modal', event => {
            $('.modal').modal('show');
        });

    </script>
@endsection
