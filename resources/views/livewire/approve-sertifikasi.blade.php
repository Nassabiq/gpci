<div>
    {{-- The whole world belongs to you --}}
    <div class="container">
        <h2>Approve Sertifikasi</h2>
        <hr>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Pabrik</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $product->nama_produk }}</td>
                        <td>{{ $product->pabrik->perusahaan->nama_perusahaan }}</td>
                        <td>{{ $product->pabrik->nama_fasilitas }}</td>
                        <td>
                            @if ($product->status == 1)
                                <span class="badge badge-pill badge-danger">Belum Diverifikasi</span>
                            @elseif($product->status == 2)
                                <span class="badge badge-pill badge-warning">Sedang Diverifikasi</span>
                            @elseif($product->status == 3)
                                <span class="badge badge-pill badge-success">Terverifikasi</span>
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="collapse"
                                data-target="#dokumen{{ $product->id }}">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="collapse" id="dokumen{{ $product->id }}">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Angket Penilaian
                                    <span
                                        class="badge {{ $product->ratings->angket_penilaian ? 'badge-success' : 'badge-danger' }}  badge-pill">
                                        @if ($product->ratings->angket_penilaian)
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="fas fa-times"></i>
                                        @endif
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Laporan Ringkas Verifikasi
                                    <span
                                        class="badge {{ $product->ratings->laporan_ringkas_verifikasi ? 'badge-success' : 'badge-danger' }}  badge-pill">
                                        @if ($product->ratings->laporan_ringkas_verifikasi)
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="fas fa-times"></i>
                                        @endif
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Recommendation for Improvement
                                    <span
                                        class="badge {{ $product->ratings->recommendation_for_improvement ? 'badge-success' : 'badge-danger' }}  badge-pill">
                                        @if ($product->ratings->recommendation_for_improvement)
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="fas fa-times"></i>
                                        @endif
                                    </span>
                                </li>
                            </ul>
                            @if ($product->status !== 3)
                            <button class="btn btn-outline-primary mt-2 float-right" data-toggle="modal"
                                data-target="#modalConfirm">
                                Approve
                            </button>
                            @endif
                            <div class="modal fade" id="modalConfirm" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h5>Approve Dokumen?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Back</button>
                                            
                                                <button type="button"
                                                    wire:click="approveSertifikasi({{ $product->id }})"
                                                    class="btn btn-primary">Yes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
