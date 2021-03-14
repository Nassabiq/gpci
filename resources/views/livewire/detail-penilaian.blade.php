<div>
    {{-- The whole world belongs to you --}}
    <h4>Detail Penilaian Sertifikasi</h4>
    <hr>
    <ul>
        <li>Untuk memulai penilaian, harap ubah status produk pada tombol dibawah</li>
        <li>Template Form Penilaian bisa diunduh pada list yang ada dibawah ini</li>
    </ul>
    <button type="button" data-toggle="modal" data-target="#modalConfirm"
        class="btn btn-sm {{ $produk->status === 1 ? 'btn-danger' : 'btn-primary' }} float-right m-4">
        @if ($produk->status === 1)
            Ubah Status Produk
        @elseif($produk->status === 2)
            Produk Sedang Diverifikasi
        @elseif($produk->status === 3)
            Produk Ter-Verifikasi
        @endif
    </button>
    {{-- Modal --}}
    <div class="modal fade" id="modalConfirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    @if ($produk->status !== 2)
                        <h5>Ubah Status Produk ?</h5>
                    @else
                        <h5>Produk sedang dalam tahap verifikasi</h5>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    @if ($produk->status !== 2)
                        <button type="button" wire:click="changeStatus({{ $produk->id }})"
                            class="btn btn-primary">Yes</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @php
        $contactPlant = json_decode($produk->pabrik->contact);
        $contactPerusahaan = json_decode($produk->pabrik->perusahaan->contact);
    @endphp
    <table class="table table-sm">
        <tbody>
            <tr>
                <th class="table-first">Nama Produk</th>
                <td class="table-second">:</td>
                <td>{{ $produk->nama_produk }}</td>
            </tr>
            <tr>
                <th class="table-first">Perusahaan</th>
                <td class="table-second">:</td>
                <td>{{ $produk->pabrik->perusahaan->nama_perusahaan }}</td>
            </tr>
            <tr>
                <th class="table-first">Contact Perusahaan</th>
                <td class="table-second">:</td>
                <td>
                    <ul>
                        <li>Nama : {{ $contactPerusahaan->cp_1->nama }}</li>
                        <li>Email : {{ $contactPerusahaan->cp_1->email }}</li>
                        <li>No. Telp : {{ $contactPerusahaan->cp_1->no_hp }}</li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th class="table-first">Plant</th>
                <td class="table-second">:</td>
                <td>{{ $produk->pabrik->nama_fasilitas }}</td>
            </tr>
            <tr>
                <th class="table-first">Contact Plant</th>
                <td class="table-second">:</td>
                <td>
                    <ul>
                        <li>Nama : {{ $contactPlant->nama }}</li>
                        <li>Email : {{ $contactPlant->email }}</li>
                        <li>No. Telp : {{ $contactPlant->no_hp }}</li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

    @if ($produk->status === 2)
        <div class="d-flex justify-content-between my-2">
            <h5>List Upload Dokumen Penilaian</h5>
            <button type="button" class="btn btn-sm btn-success">
                <i class="fas fa-file-pdf mr-2"></i>
                Download Template Angket Penilaian
            </button>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">List</th>
                    <th scope="col">Upload File</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Angket Penilaian</td>
                    <td><input type="file" {{-- wire:model="sds_material_doc" --}}></td>
                    <td><button type="button" class="btn btn-sm btn-primary ml-2" {{-- wire:click="updateSDSMaterial({{ $document->id }})" --}}>Upload</button>
                    </td>
                </tr>
                <tr>
                    <td>Laporan Ringkas Verifikasi</td>
                    <td><input type="file" {{-- wire:model="sds_material_doc" --}}></td>
                    <td><button type="button" class="btn btn-sm btn-primary ml-2" {{-- wire:click="updateSDSMaterial({{ $document->id }})" --}}>Upload</button>
                    </td>
                </tr>
                <tr>
                    <td>Recommendation for Improvement</td>
                    <td><input type="file" {{-- wire:model="sds_material_doc" --}}></td>
                    <td><button type="button" class="btn btn-sm btn-primary ml-2" {{-- wire:click="updateSDSMaterial({{ $document->id }})" --}}>Upload</button>
                    </td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
@section('js')
    <script>
        window.livewire.on('hideModal', () => {
            $('.modal').modal('hide');
        });

    </script>
@endsection
