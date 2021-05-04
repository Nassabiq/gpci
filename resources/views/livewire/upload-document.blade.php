<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="container">
        <h2>Dokumen Sertifikasi</h2>
        <p>
            Dokumen yang diperbolehkan harus berbentuk <b>PDF</b> <br> dan setiap dokumen memiliki ukuran maksimal 2MB
        </p>
        <hr>
        <div class="col-3 my-3">
            <select class="custom-select" id="produk" wire:model="product">
                <option value="" selected>Jenis Produk</option>
                @if ($company)
                    @foreach ($company as $item)
                        @foreach ($item->factories as $factory)
                            @foreach ($factory->produk as $produk)
                                <option value="{{ $produk->id }}">
                                    {{ $produk->nama_produk }}
                                    @if (Auth::user()->hasRole(['admin', 'super-admin']))
                                        - {{ $item->nama_perusahaan }}
                                    @endif
                                </option>
                            @endforeach
                        @endforeach
                    @endforeach
                @endif
            </select>
        </div>
        @if ($document)
            <div class="table-responsive-md">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Dokumen</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Action</th>
                            <th scope="col">Status</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($document->document as $key => $doc)

                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    {{ $doc->nama_dokumen }}
                                </td>
                                @if ($doc->pivot->nama_dokumen == null)
                                    <td>
                                        <input type="file" wire:model="nama_dokumen">
                                        @error('nama_dokumen') <span class="error">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary ml-2"
                                            wire:click="uploadDokumen({{ $doc->id }}, '{{ $doc->nama_dokumen }}')">Upload</button>
                                    </td>
                                @else
                                    <td>
                                        {{ $doc->pivot->nama_dokumen }}
                                        <div class="collapse mt-2" id="edit-{{ $doc->id }}" wire:ignore.self>
                                            <div class="card card-body d-flex">
                                                <div class="d-flex">
                                                    <input type="file" wire:model="nama_dokumen">
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        wire:click="uploadDokumen({{ $doc->id }}, '{{ $doc->nama_dokumen }}', '{{ $item->nama_perusahaan }}')">Edit</button>
                                                </div>
                                                @error('nama_dokumen') <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ asset('storage/checklist-dokumen/' . $this->nama_perusahaan . '/' . $doc->pivot->nama_dokumen) }}"
                                                class="btn btn-sm btn-primary" target="_blank">Dokumen</a>
                                            @if ($doc->pivot->status !== 2)
                                                <button class="btn btn-sm btn-success ml-2" data-toggle="collapse"
                                                    data-target="#edit-{{ $doc->id }}">Edit</button>
                                            @endif
                                        </div>
                                    </td>
                                @endif
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
                                    {{ $doc->pivot->keterangan }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="document" id="document">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"> </script>
    <script>
        window.addEventListener('swal:error', event => {
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
                dangerMode: true,
                timer: 1500,
            });
        });

    </script>
@endsection
