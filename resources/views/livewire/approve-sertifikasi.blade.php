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
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="collapse"
                                data-target="#dokumen{{ $product->id }}">Details</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="collapse" id="dokumen{{ $product->id }}">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Angket Penilaian
                                    <span class="badge badge-success badge-pill">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Laporan Ringkas Verifikasi
                                    <span class="badge badge-danger badge-pill">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Recommendation for Improvement
                                    <span class="badge badge-danger badge-pill">
                                        <i class="fas fa-times"></i>
                                    </span>
                                </li>
                            </ul>
                            <button class="btn btn-outline-primary mt-2 float-right">
                                Approve
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
