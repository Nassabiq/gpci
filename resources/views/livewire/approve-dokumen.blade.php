<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container">
        <h2>Approve Dokumen</h2>
        <hr>
        <label for="company" class="col-1">Perusahaan</label>
        <div class="d-flex">
            <div class="col-3">
                <select class="custom-select" id="company" wire:model="selectedCompany">
                    <option value="" selected>Perusahaan</option>
                    @if ($companies)
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">
                                {{ $company->nama_perusahaan }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            @if (!is_null($selectedCompany))
                <label for="factory" class="col-1">Factory</label>
                <div class="col-3">
                    <select class="form-control" wire:model="selectedFactory">
                        <option value="" selected>Factory</option>
                        @foreach ($factories as $factory)
                            <option value="{{ $factory->id }}">{{ $factory->nama_fasilitas }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if (!is_null($selectedFactory))
                <label for="products" class="col-1">Products</label>
                <div class="col-3">
                    <select class="form-control" wire:model="selectedProduct">
                        <option value="0">Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
        {{-- @dump($document) --}}
        @if ($selectedProduct != 0)
            <table class="table mt-4">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nama Dokumen</th>
                        <th scope="col">File</th>
                        <th scope="col">Action</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($document->document as $doc)
                        <tr>
                            <td>
                                {{ $doc->nama_dokumen }}
                            </td>
                            @if ($doc->pivot->nama_dokumen)
                                <td>
                                    {{ $doc->pivot->nama_dokumen }}
                                </td>
                                <td class="d-flex">
                                    <a href="{{ asset('storage/checklist-dokumen/' . $this->perusahaan->nama_perusahaan . '/' . $doc->pivot->nama_dokumen) }}"
                                        class="btn btn-sm btn-primary" target="_blank">Preview</a>

                                    <button class="btn btn-sm btn-success ml-2 approve" data-toggle="modal"
                                        data-target="#approve-{{ $doc->id }}">Approve</button>

                                    {{-- Modal --}}
                                    <div class="modal fade" id="approve-{{ $doc->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h5>Approve Dokumen ?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No</button>
                                                    <button type="button" wire:click="approve({{ $doc->id }})"
                                                        class="btn btn-primary">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @switch($doc->pivot->status)
                                        @case(0)
                                        <span class="badge badge-pill badge-secondary">kosong</span>
                                        @break
                                        @case(1)
                                        <span class="badge badge-pill badge-danger">Belum diapprove</span>
                                        @break
                                        @case(2)
                                        <span class="badge badge-pill badge-success">Approved</span>
                                        @break
                                        @default
                                    @endswitch
                                </td>
                                <td>
                                    @if ($doc->pivot->keterangan)
                                        {{ $doc->pivot->keterangan }}
                                    @else
                                        <button class="btn btn-sm btn-info ml-2" data-toggle="modal"
                                            data-target="#keterangan{{ $doc->id }}">Keterangan</button>

                                        {{-- Modal Keterangan --}}
                                        <div class="modal fade" tabindex="-1" id="keterangan{{ $doc->id }}"
                                            wire:ignore.self>
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tambah Keterangan</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="name" wire:model="keterangan"
                                                                class="form-control"
                                                                placeholder="Keterangan Dokumen...">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="button"
                                                            wire:click="addKeterangan({{ $doc->id }})"
                                                            class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            @else
                                <td>
                                    <span class="badge badge-pill badge-warning">Belum Ada Dokumen</span>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@section('js')
    <script>
        // window.onbeforeunload = function() {
        //     return "Data will be lost if you leave the page, are you sure?";
        // };

        window.livewire.on('hideModal', () => {
            $('.modal').modal('hide');
            $('.modal-backdrop').remove();
        });

        // $(document).on('click', '.showmodal', function() {
        //     let name = $(this).data('name');
        //     let id = $(this).data('id');
        //     $('.modal').modal('show');
        //     let doc = $('#submit');
        //     doc.attr("wire:click", 'approve' + name + '(' + id + ')');
        //     console.log(doc);
        // });

    </script>
@endsection
