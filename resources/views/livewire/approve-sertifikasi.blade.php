<div>
    {{-- The whole world belongs to you --}}
    <h4>Detail Penilaian Sertifikasi</h4>
    <hr>
    <ul>
        <li>Untuk memulai penilaian, harap ubah status produk pada tombol dibawah</li>
        <li>Template Form Penilaian bisa diunduh pada list yang ada dibawah ini</li>
    </ul>
    @if ($produk->status == 2)
        <button class="btn btn-outline-primary my-2 float-right" data-toggle="modal" data-target="#modalConfirm">
            Approve
        </button>
    @elseif($produk->status == 1)
    @else
        <button class="btn btn-primary my-2 float-right" disabled>
            Produk telah disertifikasi
        </button>
    @endif
    <div class="modal fade" id="modalConfirm" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Approve Sertifikasi?</h5>
                    <p>Score untuk sertifikasi : </p>
                    <select class="custom-select" wire:model="scoring_id">
                        <option>Pilih Score Sertifikasi</option>
                        <option value="1">Bronze</option>
                        <option value="2">Silver</option>
                        <option value="3">Gold</option>
                    </select>
                    @error('scoring_id') <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>

                    <button type="button" wire:click="approveSertifikasi({{ $produk->id }})"
                        class="btn btn-primary">Yes</button>
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

    <h5>List Dokumen Audit Sertifikasi</h5>
    <div class="table-responsive-md">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">List</th>
                    <th scope="col">Status</th>
                    <th scope="col">Dokumen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Angket Penilaian</td>
                    <td>
                        <span
                            class="badge {{ $produk->ratings->angket_penilaian !== null ? 'badge-success' : 'badge-danger' }}  badge-pill">
                            @if ($produk->ratings->angket_penilaian !== null)
                                <i class="fas fa-check"></i>
                            @else
                                <i class="fas fa-times"></i>
                            @endif
                        </span>
                    </td>
                    @if ($this->produk->ratings->angket_penilaian)
                        <td>
                            <a href="{{ asset('storage/dokumen_audit/' . $this->produk->nama_produk . '/' . $this->produk->ratings->angket_penilaian) }}"
                                class="btn btn-sm btn-success" target="_blank  ">Preview</a>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td>Laporan Ringkas Verifikasi</td>
                    <td>
                        <span
                            class="badge {{ $produk->ratings->laporan_ringkas_verifikasi !== null ? 'badge-success' : 'badge-danger' }}  badge-pill">
                            @if ($produk->ratings->laporan_ringkas_verifikasi !== null)
                                <i class="fas fa-check"></i>
                            @else
                                <i class="fas fa-times"></i>
                            @endif
                        </span>
                    </td>
                    @if ($this->produk->ratings->laporan_ringkas_verifikasi)
                        <td>
                            <a href="{{ asset('storage/dokumen_audit/' . $this->produk->nama_produk . '/' . $this->produk->ratings->laporan_ringkas_verifikasi) }}"
                                class="btn btn-sm btn-success" target="_blank  ">Preview</a>
                        </td>
                    @endif
                </tr>
                <tr>
                    <td>Recommendation for Improvement</td>
                    <td>
                        <span
                            class="badge {{ $produk->ratings->recommendation_for_improvement !== null ? 'badge-success' : 'badge-danger' }}  badge-pill">
                            @if ($produk->ratings->recommendation_for_improvement !== null)
                                <i class="fas fa-check"></i>
                            @else
                                <i class="fas fa-times"></i>
                            @endif
                        </span>
                    </td>
                    @if ($this->produk->ratings->recommendation_for_improvement)
                        <td>
                            <a href="{{ asset('storage/dokumen_audit/' . $this->produk->nama_produk . '/' . $this->produk->ratings->recommendation_for_improvement) }}"
                                class="btn btn-sm btn-success" target="_blank  ">Preview</a>
                        </td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</div>
@section('js')

    <script>
        window.addEventListener('submit', event => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
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

    </script>
@endsection
