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
                        <option value="" selected>Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        </div>
        @if (!is_null($selectedProduct))
            <table class="table mt-4">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Nama Dokumen</th>
                        <th scope="col">File</th>
                        <th scope="col">Status</th>
                        <th scope="col">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($document->akta_notaris_doc)
                        <tr>
                            <td>Salinan akta notaris pendirian perusahaan.</td>
                            <td>
                                <div class="row">
                                    <div class="document col-12 mb-4">
                                        {{ $document->akta_notaris_doc }}
                                    </div>
                                    @if ($perusahaan)
                                        <a href="{{ asset('storage/checklist-dokumen/' . $perusahaan->nama_perusahaan . '/' . $document->akta_notaris_doc) }}"
                                            class="btn btn-primary col-5" target="_blank  ">Lihat Dokumen</a>
                                    @endif
                                    @if ($document->status_akta_notaris_doc !== 2)
                                        <button class="btn btn-success ml-2 col-3 approve" data-toggle="modal"
                                            data-target="#modalAkta">Approve</button>
                                    @endif
                                </div>
                                {{-- Modal --}}
                                <div class="modal fade" id="modalAkta" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Approve Dokumen ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="button"
                                                    wire:click="approveAktaNotaris({{ $document->id }})"
                                                    class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @switch($document->status_akta_notaris_doc)
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
                                @if ($document->ket_akta_notaris_doc)
                                    {{ $document->ket_akta_notaris_doc }}
                                @else
                                    <div x-data="{open:false}">
                                        <button class="btn btn-sm btn-info ml-2 col-12" @click="open=true">Tambah
                                            Keterangan</button>
                                        <div class="modal fade" x-show="open" @click.away="open=false" tabindex="-1"
                                            id="ketAktaNotaris">
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
                                                            <input type="name" wire:model="ket_akta_notaris_doc"
                                                                class="form-control"
                                                                placeholder="Keterangan untuk Akta Notaris...">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="button"
                                                            wire:click="ketAktaNotaris({{ $document->id }})"
                                                            class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if ($document->siup_doc)
                        <tr>
                            <td>Salinan Surat Izin Usaha Perdagangan (SIUP)</td>
                            <td>
                                <div class="row">
                                    <div class="document col-12 mb-4">
                                        {{ $document->siup_doc }}
                                    </div>
                                    @if ($perusahaan)
                                        <a href="{{ asset('storage/checklist-dokumen/' . $perusahaan->nama_perusahaan . '/' . $document->siup_doc) }}"
                                            class="btn btn-primary col-5" target="_blank  ">Lihat Dokumen</a>
                                    @endif
                                    @if ($document->status_siup_doc !== 2)
                                        <button class="btn btn-success ml-2 col-3 approve" data-toggle="modal"
                                            data-target="#modalSIUP">Approve</button>
                                    @endif
                                </div>
                                {{-- Modal --}}
                                <div class="modal fade" id="modalSIUP" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Approve Dokumen ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="button" wire:click="approveSIUP({{ $document->id }})"
                                                    class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @switch($document->status_siup_doc)
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
                                @if ($document->ket_siup_doc)
                                    {{ $document->ket_siup_doc }}
                                @else
                                    <button class="btn btn-sm btn-info ml-2 col-12" data-toggle="modal"
                                        data-target="#ketSIUP">Tambah Keterangan</button>
                                    <div class="modal fade" tabindex="-1" id="ketSIUP">
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
                                                        <input type="name" wire:model="ket_siup_doc"
                                                            class="form-control" placeholder="Keterangan untuk SIUP...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="button" wire:click="ketSIUP({{ $document->id }})"
                                                        class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if ($document->tdp_doc)
                        <tr>
                            <td>Salinan Tanda Daftar Perusahaan (TDP).</td>
                            <td>
                                <div class="row">
                                    <div class="document col-12 mb-4">
                                        {{ $document->tdp_doc }}
                                    </div>
                                    @if ($perusahaan)
                                        <a href="{{ asset('storage/checklist-dokumen/' . $perusahaan->nama_perusahaan . '/' . $document->tdp_doc) }}"
                                            class="btn btn-primary col-5" target="_blank  ">Lihat Dokumen</a>
                                    @endif
                                    @if ($document->status_tdp_doc !== 2)
                                        <button class="btn btn-success ml-2 col-3 approve" data-toggle="modal"
                                            data-target="#modalTDP">Approve</button>
                                    @endif
                                </div>
                                {{-- Modal --}}
                                <div class="modal fade" id="modalTDP" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Approve Dokumen ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="button" wire:click="approveTDP({{ $document->id }})"
                                                    class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @switch($document->status_tdp_doc)
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
                                @if ($document->ket_tdp_doc)
                                    {{ $document->ket_tdp_doc }}
                                @else
                                    <button class="btn btn-sm btn-info ml-2 col-12" data-toggle="modal"
                                        data-target="#ketTDP">Tambah Keterangan</button>
                                    <div class="modal fade" tabindex="-1" id="ketTDP">
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
                                                        <input type="name" wire:model="ket_tdp_doc" class="form-control"
                                                            placeholder="Keterangan untuk TDP...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="button" wire:click="ketTDP({{ $document->id }})"
                                                        class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if ($document->npwp_doc)
                        <tr>
                            <td>Salinan Nomor Pokok Wajib Pajak (NPWP) Perusahaan</td>
                            <td>
                                <div class="row">
                                    <div class="document col-12 mb-4">
                                        {{ $document->npwp_doc }}
                                    </div>
                                    @if ($perusahaan)
                                        <a href="{{ asset('storage/checklist-dokumen/' . $perusahaan->nama_perusahaan . '/' . $document->npwp_doc) }}"
                                            class="btn btn-primary col-5" target="_blank  ">Lihat Dokumen</a>
                                    @endif
                                    @if ($document->status_npwp_doc !== 2)
                                        <button class="btn btn-success ml-2 col-3 approve" data-toggle="modal"
                                            data-target="#modalNPWP">Approve</button>
                                    @endif
                                </div>
                                {{-- Modal --}}
                                <div class="modal fade" id="modalNPWP" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Approve Dokumen ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="button" wire:click="approveNPWP({{ $document->id }})"
                                                    class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @switch($document->status_npwp_doc)
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
                                @if ($document->ket_npwp_doc)
                                    {{ $document->ket_npwp_doc }}
                                @else
                                    <button class="btn btn-sm btn-info ml-2 col-12" data-toggle="modal"
                                        data-target="#ketNPWP">Tambah Keterangan</button>
                                    <div class="modal fade" tabindex="-1" id="ketNPWP">
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
                                                        <input type="name" wire:model="ket_npwp_doc"
                                                            class="form-control" placeholder="Keterangan untuk NPWP...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="button" wire:click="ketNPWP({{ $document->id }})"
                                                        class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if ($document->api_doc)
                        <tr>
                            <td>Informasi importer dan salinan Angka Pengenal Importir (API).</td>
                            <td>
                                <div class="row">
                                    <div class="document col-12 mb-4">
                                        {{ $document->api_doc }}
                                    </div>
                                    @if ($perusahaan)
                                        <a href="{{ asset('storage/checklist-dokumen/' . $perusahaan->nama_perusahaan . '/' . $document->api_doc) }}"
                                            class="btn btn-primary col-5" target="_blank  ">Lihat Dokumen</a>
                                    @endif
                                    @if ($document->status_npwp_doc !== 2)
                                        <button class="btn btn-success ml-2 col-3 approve" data-toggle="modal"
                                            data-target="#modalAPI">Approve</button>
                                    @endif
                                </div>
                                {{-- Modal --}}
                                <div class="modal fade" id="modalAPI" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Approve Dokumen ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="button" wire:click="approveAPI({{ $document->id }})"
                                                    class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @switch($document->status_api_doc)
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
                                @if ($document->ket_api_doc)
                                    {{ $document->ket_api_doc }}
                                @else
                                    <button class="btn btn-sm btn-info ml-2 col-12" data-toggle="modal"
                                        data-target="#ketAPI">Tambah Keterangan</button>
                                    <div class="modal fade" tabindex="-1" id="ketAPI">
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
                                                        <input type="name" wire:model="ket_API_doc" class="form-control"
                                                            placeholder="Keterangan untuk API...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="button" wire:click="ketAPI({{ $document->id }})"
                                                        class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if ($document->daftar_merk_doc)
                        <tr>
                            <td>Salinan Tanda Daftar Merk terbitan Dirjen HAKI Kemenhumham.</td>
                            <td>
                                <div class="row">
                                    <div class="document col-12 mb-4">
                                        {{ $document->daftar_merk_doc }}
                                    </div>
                                    @if ($perusahaan)
                                        <a href="{{ asset('storage/checklist-dokumen/' . $perusahaan->nama_perusahaan . '/' . $document->daftar_merk_doc) }}"
                                            class="btn btn-primary col-5" target="_blank  ">Lihat Dokumen</a>
                                    @endif
                                    @if ($document->status_npwp_doc !== 2)
                                        <button class="btn btn-success ml-2 col-3 approve" data-toggle="modal"
                                            data-target="#modalDaftarMerk">Approve</button>
                                    @endif
                                </div>
                                {{-- Modal --}}
                                <div class="modal fade" id="modalDaftarMerk" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Approve Dokumen ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="button"
                                                    wire:click="approveDaftarMerk({{ $document->id }})"
                                                    class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @switch($document->status_daftar_merk_doc)
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
                                @if ($document->ket_daftar_merk_doc)
                                    {{ $document->ket_daftar_merk_doc }}
                                @else
                                    <button class="btn btn-sm btn-info ml-2 col-12" data-toggle="modal"
                                        data-target="#ketDaftarMerk">Tambah Keterangan</button>
                                    <div class="modal fade" tabindex="-1" id="ketDaftarMerk">
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
                                                        <input type="name" wire:model="ket_daftar_merk_doc"
                                                            class="form-control"
                                                            placeholder="Keterangan untuk Daftar Merk...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="button"
                                                        wire:click="ketDaftarMerk({{ $document->id }})"
                                                        class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if ($document->sds_produk_doc)
                        <tr>
                            <td>Lembar keselamatan bahan (SDS) dari produk yang akan disertifikasi.</td>
                            <td>
                                <div class="row">
                                    <div class="document col-12 mb-4">
                                        {{ $document->sds_produk_doc }}
                                    </div>
                                    @if ($perusahaan)
                                        <a href="{{ asset('storage/checklist-dokumen/' . $perusahaan->nama_perusahaan . '/' . $document->sds_produk_doc) }}"
                                            class="btn btn-primary col-5" target="_blank  ">Lihat Dokumen</a>
                                    @endif
                                    @if ($document->status_npwp_doc !== 2)
                                        <button class="btn btn-success ml-2 col-3 approve" data-toggle="modal"
                                            data-target="#modalSDSProduk">Approve</button>
                                    @endif
                                </div>
                                {{-- Modal --}}
                                <div class="modal fade" id="modalSDSProduk" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Approve Dokumen ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="button"
                                                    wire:click="approveSDSProduk({{ $document->id }})"
                                                    class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @switch($document->status_sds_produk_doc)
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
                                @if ($document->ket_sds_produk_doc)
                                    {{ $document->ket_sds_produk_doc }}
                                @else
                                    <button class="btn btn-sm btn-info ml-2 col-12" data-toggle="modal"
                                        data-target="#ketNPWP">Tambah Keterangan</button>
                                    <div class="modal fade" tabindex="-1" id="ketNPWP">
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
                                                        <input type="name" wire:model="ket_sds_produk_doc"
                                                            class="form-control"
                                                            placeholder="Keterangan untuk SDS Produk...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="button"
                                                        wire:click="ketSDSProduk({{ $document->id }})"
                                                        class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if ($document->material_bill_doc)
                        <tr>
                            <td>Bill of material dari produk yang akan disertifikasi.</td>
                            <td>
                                <div class="row">
                                    <div class="document col-12 mb-4">
                                        {{ $document->material_bill_doc }}
                                    </div>
                                    @if ($perusahaan)
                                        <a href="{{ asset('storage/checklist-dokumen/' . $perusahaan->nama_perusahaan . '/' . $document->material_bill_doc) }}"
                                            class="btn btn-primary col-5" target="_blank  ">Lihat Dokumen</a>
                                    @endif
                                    @if ($document->status_npwp_doc !== 2)
                                        <button class="btn btn-success ml-2 col-3 approve" data-toggle="modal"
                                            data-target="#modalMaterialBill">Approve</button>
                                    @endif
                                </div>
                                {{-- Modal --}}
                                <div class="modal fade" id="modalMaterialBill" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Approve Dokumen ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="button"
                                                    wire:click="approveMaterialBill({{ $document->id }})"
                                                    class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @switch($document->status_material_bill_doc)
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
                                @if ($document->ket_material_bill_doc)
                                    {{ $document->ket_material_bill_doc }}
                                @else
                                    <button class="btn btn-sm btn-info ml-2 col-12" data-toggle="modal"
                                        data-target="#ketMaterialBill">Tambah Keterangan</button>
                                    <div class="modal fade" tabindex="-1" id="ketMaterialBill">
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
                                                        <input type="name" wire:model="ket_material_bill_doc"
                                                            class="form-control"
                                                            placeholder="Keterangan untuk Material Bill...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="button"
                                                        wire:click="ketMaterialBill({{ $document->id }})"
                                                        class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif
                    @if ($document->sds_material_doc)
                        <tr>
                            <td>Lembar keselamatan bahan (SDS) dari seluruh bahan baku yang digunakan.</td>
                            <td>
                                <div class="row">
                                    <div class="document col-12 mb-4">
                                        {{ $document->sds_material_doc }}
                                    </div>
                                    @if ($perusahaan)
                                        <a href="{{ asset('storage/checklist-dokumen/' . $perusahaan->nama_perusahaan . '/' . $document->sds_material_doc) }}"
                                            class="btn btn-primary col-5" target="_blank  ">Lihat Dokumen</a>
                                    @endif
                                    @if ($document->status_npwp_doc !== 2)
                                        <button class="btn btn-success ml-2 col-3 approve" data-toggle="modal"
                                            data-target="#modalSDSMaterial">Approve</button>
                                    @endif
                                </div>
                                {{-- Modal --}}
                                <div class="modal fade" id="modalSDSMaterial" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5>Approve Dokumen ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">No</button>
                                                <button type="button"
                                                    wire:click="approveSDSMaterial({{ $document->id }})"
                                                    class="btn btn-primary">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @switch($document->status_sds_material_doc)
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
                                @if ($document->ket_sds_material_doc)
                                    {{ $document->ket_sds_material_doc }}
                                @else
                                    <button class="btn btn-sm btn-info ml-2 col-12" data-toggle="modal"
                                        data-target="#ketSDSMaterial">Tambah Keterangan</button>
                                    <div class="modal fade" tabindex="-1" id="ketSDSMaterial">
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
                                                        <input type="name" wire:model="ket_sds_material_doc"
                                                            class="form-control"
                                                            placeholder="Keterangan untuk SDS Material...">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="button"
                                                        wire:click="ketSDSMaterial({{ $document->id }})"
                                                        class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif
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
        });

        // $(document).on('click', '.approve', function() {
        //     let name = $(this).data('name');
        //     let id = $(this).data('id');
        //     $('.modal').modal('show');
        //     let doc = $('#submit');
        //     doc.attr("wire:click", 'approve' + name + '(' + id + ')');
        //     console.log(doc);
        // });

    </script>
@endsection
