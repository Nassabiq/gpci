<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="container">
        <h2>Dokumen Sertifikasi</h2>
        <p>
            Dokumen yang diperbolehkan harus berbentuk <b>PDF</b> <br> dan setiap dokumen memiliki ukuran maksimal 2MB
        </p>
        <hr>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
        <div class="col-3 my-3">
            <select class="custom-select" id="produk" wire:model="product">
                <option value="" selected>Jenis Produk</option>
                @if ($company)
                    @foreach ($company->factories as $item)
                        @foreach ($item->produk as $produk)
                            <option value="{{ $produk->id }}">
                                {{ $produk->nama_produk }}
                            </option>
                        @endforeach
                    @endforeach
                @endif
            </select>
        </div>
        @if ($document)
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dokumen</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Action</th>
                            <th scope="col">Status</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- AKTA NOTARIS DOKUMEN UPLOAD --}}
                        <tr>
                            <th scope="row">1</th>
                            <td>Salinan akta notaris pendirian perusahaan.</td>
                            @if (!$document->akta_notaris_doc)
                                <td>
                                    <input type="file" wire:model="akta_notaris_doc">
                                    @error('akta_notaris_doc') <span class="error">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary ml-2"
                                        wire:click.prevent="updateAktaNotaris({{ $document->id }})">Upload</button>
                                </td>
                            @else
                                <td>
                                    {{ $document->akta_notaris_doc }}
                                    <div class="collapse mt-2" id="editakta" wire:ignore.self>
                                        <div class="card card-body d-flex">
                                            <div class="d-flex">
                                                <input type="file" wire:model="akta_notaris_doc">
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    wire:click.prevent="updateAktaNotaris({{ $document->id }})">Edit</button>
                                            </div>
                                            @error('akta_notaris_doc') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ asset('storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->akta_notaris_doc) }}"
                                            class="btn btn-sm btn-primary" target="_blank">Dokumen</a>
                                        @if ($document->status_akta_notaris_doc !== 2)
                                            <button class="btn btn-sm btn-success ml-2" data-toggle="collapse"
                                                data-target="#editakta">Edit</button>
                                        @endif
                                    </div>
                                </td>
                            @endif
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
                            <td>{{ $document->ket_akta_notaris_doc }}</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Salinan Surat Izin Usaha Perdagangan (SIUP)</td>
                            @if (!$document->siup_doc)
                                <td>
                                    <input type="file" wire:model="siup_doc">
                                    @error('siup_doc') <span class="error">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary"
                                        wire:click.prevent="updateSIUP({{ $document->id }})">Upload</button>
                                </td>
                            @else
                                <td>
                                    {{ $document->siup_doc }}
                                    <div class="collapse mt-2" id="editsiup" wire:ignore.self>
                                        <div class="card card-body">
                                            <div class="d-flex">
                                                <input type="file" wire:model="siup_doc">
                                                <button type="button" class="btn btn-sm btn-primary ml-2"
                                                    wire:click="updateSIUP({{ $document->id }})">Edit</button>
                                            </div>
                                        </div>
                                        @error('siup_doc') <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ asset('storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->siup_doc) }}"
                                            class="btn btn-primary btn-sm" target="_blank  ">Dokumen</a>
                                        @if ($document->status_siup_doc !== 2)
                                            <button class="btn btn-success ml-2 btn-sm" data-toggle="collapse"
                                                data-target="#editsiup">Edit</button>
                                        @endif
                                    </div>

                                </td>
                            @endif
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
                            <td>{{ $document->ket_siup_doc }}</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Salinan Tanda Daftar Perusahaan (TDP).</td>
                            @if (!$document->tdp_doc)
                                <td>
                                    <input type="file" id="tdp_doc" wire:model="tdp_doc">
                                    @error('tdp_doc') <span class="error">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary"
                                        wire:click.prevent="updateTDP({{ $document->id }})">Upload</button>
                                </td>
                            @else
                                <td>
                                    {{ $document->tdp_doc }}
                                    <div class="collapse mt-2" id="edittdp" wire:ignore.self>
                                        <div class="card card-body">
                                            <div class="d-flex">
                                                <input type="file" wire:model="tdp_doc">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    wire:click="updateTDP({{ $document->id }})">Edit</button>
                                            </div>
                                            @error('tdp_doc') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ asset('storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->tdp_doc) }}"
                                            class="btn btn-primary btn-sm" target="_blank  ">Dokumen</a>
                                        @if ($document->status_tdp_doc !== 2)
                                            <button class="btn btn-success btn-sm ml-2" data-toggle="collapse"
                                                data-target="#edittdp">Edit</button>
                                        @endif
                                    </div>
                                </td>
                            @endif
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
                            <td>{{ $document->ket_tdp_doc }}</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Salinan Nomor Pokok Wajib Pajak (NPWP) perusahaan.</td>
                            @if (!$document->npwp_doc)
                                <td>
                                    <input type="file" wire:model="npwp_doc">
                                    @error('npwp_doc') <span class="error">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        wire:click.prevent="updateNPWP({{ $document->id }})">Upload</button>
                                </td>
                            @else
                                <td>
                                    {{ $document->npwp_doc }}
                                    <div class="collapse mt-2" id="editnpwp" wire:ignore.self>
                                        <div class="card card-body">
                                            <div class="d-flex">
                                                <input type="file" wire:model="npwp_doc">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    wire:click="updateNPWP({{ $document->id }})">Edit</button>
                                            </div>
                                        </div>
                                        @error('npwp_doc') <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ asset('storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->npwp_doc) }}"
                                            class="btn btn-primary btn-sm" target="_blank  ">Dokumen</a>
                                        @if ($document->status_npwp_doc !== 2)
                                            <button class="btn btn-success ml-2 btn-sm" data-toggle="collapse"
                                                data-target="#editnpwp">Edit</button>
                                        @endif
                                    </div>
                                </td>
                            @endif
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
                            <td>{{ $document->ket_npwp_doc }}</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Informasi importer dan salinan Angka Pengenal Importir (API).</td>
                            @if (!$document->api_doc)
                                <td>
                                    <input type="file" wire:model="api_doc">
                                    @error('api_doc') <span class="error">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        wire:click.prevent="updateAPI({{ $document->id }})">Upload</button>
                                </td>
                            @else
                                <td>
                                    {{ $document->api_doc }}
                                    <div class="mt-2 collapse" id="editapi" wire:ignore.self>
                                        <div class="card card-body d-flex">
                                            <div class="d-flex">
                                                <input type="file" wire:model="api_doc">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    wire:click="updateAPI({{ $document->id }})">Edit</button>
                                            </div>
                                            @error('api_doc') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ asset('storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->api_doc) }}"
                                            class="btn btn-primary btn-sm" target="_blank  ">Dokumen</a>
                                        @if ($document->status_api_doc !== 2)
                                            <button class="btn btn-success ml-2 btn-sm" data-toggle="collapse"
                                                data-target="#editapi">Edit</button>
                                        @endif
                                    </div>
                                </td>
                            @endif
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
                            <td>{{ $document->ket_api_doc }}</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Salinan Tanda Daftar Merk terbitan Dirjen HAKI Kemenhumham.</td>
                            @if (!$document->daftar_merk_doc)
                                <td>
                                    <input type="file" wire:model="daftar_merk_doc">
                                    @error('daftar_merk_doc') <span class="error">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        wire:click.prevent="updateDaftarMerk({{ $document->id }})">Upload</button>
                                </td>
                            @else
                                <td>
                                    {{ $document->daftar_merk_doc }}
                                    <div id="editdaftarmerk" class="mt-2 collapse" wire:ignore.self>
                                        <div class="card card-body">
                                            <div class="d-flex">
                                                <input type="file" wire:model="daftar_merk_doc">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    wire:click="updateDaftarMerk({{ $document->id }})">Edit</button>
                                            </div>
                                            @error('daftar_merk_doc') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ asset('storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->daftar_merk_doc) }}"
                                            class="btn btn-primary btn-sm" target="_blank">Dokumen</a>
                                        @if ($document->status_daftar_merk_doc !== 2)
                                            <button class="btn btn-success ml-2 btn-sm" data-toggle="collapse"
                                                data-target="#editdaftarmerk">Edit</button>
                                        @endif
                                    </div>
                                </td>
                            @endif
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
                            <td>{{ $document->ket_daftar_merk_doc }}</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Lembar keselamatan bahan (SDS) dari produk yang akan disertifikasi.</td>
                            @if (!$document->sds_produk_doc)
                                <td>
                                    <input type="file" wire:model="sds_produk_doc">
                                    @error('sds_produk_doc') <span class="error">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        wire:click.prevent="updateSDSProduk({{ $document->id }})">Upload</button>
                                </td>
                            @else
                                <td>
                                    {{ $document->sds_produk_doc }}
                                    <div id="editsdsproduk" class="mt-2 collapse" wire:ignore.self>
                                        <div class="card card-body">
                                            <div class="d-flex">
                                                <input type="file" wire:model="sds_produk_doc">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    wire:click="updateSDSProduk({{ $document->id }})">Edit</button>
                                            </div>
                                            @error('sds_produk_doc') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ asset('storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->sds_produk_doc) }}"
                                            class="btn btn-primary btn-sm" target="_blank">Dokumen</a>
                                        @if ($document->status_sds_produk_doc !== 2)
                                            <button class="btn btn-success ml-2 btn-sm" data-toggle="collapse"
                                                data-target="#editsdsproduk">Edit</button>
                                        @endif
                                    </div>
                                </td>
                            @endif
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
                            <td>{{ $document->ket_sds_produk_doc }}</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Bill of material dari produk yang akan disertifikasi.</td>
                            @if (!$document->material_bill_doc)
                                <td>
                                    <input type="file" wire:model="material_bill_doc">
                                    @error('material_bill_doc') <span class="error">{{ $message }}</span>
                                    @enderror

                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        wire:click.prevent="updateMaterialBill({{ $document->id }})">Upload</button>
                                </td>
                            @else
                                <td>
                                    {{ $document->material_bill_doc }}
                                    <div id="editmaterialbill" class="mt-2 collapse" wire:ignore.self>
                                        <div class="card card-body">
                                            <div class="d-flex">
                                                <input type="file" wire:model="material_bill_doc">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    wire:click="updateMaterialBill({{ $document->id }})">Edit</button>
                                            </div>
                                            @error('material_bill_doc') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ asset('storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->material_bill_doc) }}"
                                            class="btn btn-primary btn-sm" target="_blank  ">Dokumen</a>
                                        @if ($document->status_material_bill_doc !== 2)
                                            <button class="btn btn-success ml-2 btn-sm" data-toggle="collapse"
                                                data-target="#editmaterialbill">Edit</button>
                                        @endif
                                    </div>
                                </td>
                            @endif
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
                            <td>{{ $document->ket_material_bill_doc }}</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>Lembar keselamatan bahan (SDS) dari seluruh bahan baku yang digunakan.</td>
                            @if (!$document->sds_material_doc)
                                <td>
                                    <input type="file" wire:model="sds_material_doc">
                                    @error('sds_material_doc') <span class="error">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        wire:click.prevent="updateSDSMaterial({{ $document->id }})">Upload</button>
                                </td>
                            @else
                                <td>
                                    {{ $document->sds_material_doc }}
                                    <div id="editsdsmaterial" class="mt-2 collapse" wire:ignore.self>
                                        <div class="card card-body">
                                            <div class="d-flex">
                                                <input type="file" wire:model="sds_material_doc">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    wire:click="updateSDSMaterial({{ $document->id }})">Edit</button>
                                            </div>
                                            @error('sds_material_doc') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ asset('storage/checklist-dokumen/' . $this->company->nama_perusahaan . '/' . $document->sds_material_doc) }}"
                                            class="btn btn-primary btn-sm" target="_blank">Dokumen</a>
                                        @if ($document->status_sds_material_doc !== 2)
                                            <button class="btn btn-success ml-2 btn-sm" data-target="#editsdsmaterial"
                                                data-toggle="collapse">Edit</button>
                                        @endif
                                    </div>
                                </td>
                            @endif

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
                            <td>{{ $document->ket_sds_material_doc }}</td>
                        </tr>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.4/pdfobject.js"
        integrity="sha512-pOkH5W0iYlsujt/wd8KQwGJlc76bfVQ+gN3wNj2jE671otBKfTqSU17mdb74MdGqU2G7ScJqH9BqQ8UvWL0hdg=="
        crossorigin="anonymous"></script>

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
        // window.livewire.on('hideModal', () => {
        //     $('.modal').modal('hide');
        // });
        // $(document).on('click', '.showPDF', function() {
        //     let url = $(this).data('url');
        //     console.log(url);
        //     $('.modal').modal('show');
        //     let doc = $('#document');
        //     // doc.append('<iframe src="' + url + '" width="100%" height="500px" type="application/pdf"></iframe>');
        //     PDFObject.embed(url, '#document')

        //     $(".modal").on('hidden.bs.modal', function() {
        //         let url1 = $(this).data('url', null);
        //     });
        // });

    </script>
@endsection
