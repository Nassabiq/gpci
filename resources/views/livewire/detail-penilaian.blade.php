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
                    @if ($produk->status == 1)
                        <h5>Ubah Status Produk ?</h5>
                    @elseif($produk->status == 2)
                        <h5>Produk sedang dalam tahap verifikasi</h5>
                    @elseif($produk->status == 3)
                        <h5>Produk telah ter-verifikasi</h5>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    @if ($produk->status == 1)
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
    @if ($produk->status === 2 || $produk->status === 3)
        <div class="d-flex justify-content-between my-2">
            <h5>List Upload Dokumen Penilaian</h5>
            @if ($produk->KategoriProduk->kategoriAngket)
                <button type="button" wire:click="download({{ $produk->KategoriProduk->kategoriAngket->id }})"
                    class="btn btn-sm btn-success">
                    <i class="fas fa-file-pdf mr-2"></i>
                    Download Template Angket Penilaian
                </button>
            @else
                <button type="button" class="btn btn-sm btn-success alert-alert">
                    <i class="fas fa-file-pdf mr-2"></i>
                    Download Template Angket Penilaian
                </button>
            @endif
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
                    @if ($this->produk->ratings->angket_penilaian)
                        <td>
                            <div class="col-12">
                                {{ $this->produk->ratings->angket_penilaian }}
                            </div>
                            <div class="collapse col-12 mt-2" id="angket" wire:ignore.self>
                                <div class="card card-body">
                                    <div class="d-flex justify-content-around">
                                        <input type="file" wire:model="angket_penilaian">
                                        <button type="button" class="btn btn-sm btn-primary ml-2"
                                            wire:click="angketPenilaian({{ $produk->ratings->id }})">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ asset('storage/dokumen_audit/' . $this->produk->nama_produk . '/' . $this->produk->ratings->angket_penilaian) }}"
                                class="btn btn-sm btn-success" target="_blank  ">Preview</a>
                            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#angket" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                Edit
                            </a>
                        </td>
                    @else
                        <td>
                            <input type="file" wire:model="angket_penilaian">
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary ml-2"
                                wire:click="angketPenilaian({{ $produk->ratings->id }})">Upload</button>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td>Laporan Ringkas Verifikasi</td>
                    @if ($this->produk->ratings->laporan_ringkas_verifikasi)
                        <td>
                            <div class="col-12">
                                {{ $this->produk->ratings->laporan_ringkas_verifikasi }}
                            </div>
                            <div class="collapse col-12 mt-2" id="laporan" wire:ignore.self>
                                <div class="card card-body">
                                    <div class="d-flex justify-content-around">
                                        <input type="file" wire:model="laporan_ringkas_verifikasi">
                                        <button type="button" class="btn btn-sm btn-primary ml-2"
                                            wire:click="laporanRingkas({{ $produk->ratings->id }})">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ asset('storage/dokumen_audit/' . $this->produk->nama_produk . '/' . $this->produk->ratings->laporan_ringkas_verifikasi) }}"
                                class="btn btn-sm btn-success" target="_blank  ">Preview</a>
                            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#laporan" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                Edit
                            </a>
                        </td>
                    @else
                        <td><input type="file" wire:model="laporan_ringkas_verifikasi"></td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary ml-2"
                                wire:click="laporanRingkas({{ $produk->ratings->id }})">Upload</button>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td>Recommendation for Improvement</td>
                    @if ($this->produk->ratings->recommendation_for_improvement)
                        <td>
                            <div class="col-12">
                                {{ $this->produk->ratings->recommendation_for_improvement }}
                            </div>
                            <div class="collapse col-12 mt-2" id="rekomendasi" wire:ignore.self>
                                <div class="card card-body">
                                    <div class="d-flex justify-content-around">
                                        <input type="file" wire:model="recommendation_for_improvement">
                                        <button type="button" class="btn btn-sm btn-primary ml-2"
                                            wire:click="rekomendasi({{ $produk->ratings->id }})">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ asset('storage/dokumen_audit/' . $this->produk->nama_produk . '/' . $this->produk->ratings->recommendation_for_improvement) }}"
                                class="btn btn-sm btn-success" target="_blank  ">Preview</a>
                            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#rekomendasi" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                Edit
                            </a>
                        </td>
                    @else
                        <td><input type="file" wire:model="recommendation_for_improvement"></td>
                        <td><button type="button" class="btn btn-sm btn-primary ml-2"
                                wire:click="rekomendasi({{ $produk->ratings->id }})">Upload</button>
                        </td>
                    @endif
                </tr>
            </tbody>
        </table>
    @endif
</div>
@section('js')
    <script>
        window.addEventListener('hideModal', () => {
            $('.modal-backdrop').remove();
            $('.modal').modal('hide');
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: event.detail.type,
                title: event.detail.message
            })
        });
        window.addEventListener('swal:error', event => {
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
                dangerMode: true,
                timer: 1500,
            });
        });

        $('body').on('click', '.alert-alert', function() {
            // alert('Data Template saat ini belum Tersedia')
            swal({
                title: "Maaf, Data Belum Tersedia",
                text: "Saat ini kita akan memperbarui dokumen yang dibutuhkan, harap menunggu",
                type: "warning",
                icon: "warning",
                showCloseButton: true,
                showConfirmButton: false,
            })
        })

    </script>
@endsection
