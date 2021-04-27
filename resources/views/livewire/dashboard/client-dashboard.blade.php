<div>
    {{-- Success is as dangerous as failure. --}}
    {{-- @dump($product_is_processing) --}}
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card card-outline card-teal">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-dashboard" style="color: #026799">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="desc ml-3">
                        <h3 class="my-0">{{ count($product) }}</h3>
                        <p class="text-secondary my-0 text-sm">Jumlah Produk Sertifikasi</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card card-outline card-teal">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-dashboard" style="color: #ffb300">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <div class="desc ml-3">
                        <h3 class="my-0">{{ count($product_is_processing) }}</h3>
                        <p class="text-secondary my-0 text-sm">Jumlah Produk yang Sedang diproses</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card card-outline card-teal">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-dashboard" style="color: #02b030">
                        <i class="far fa-check-circle"></i>
                    </div>
                    <div class="desc ml-3">
                        <h3 class="my-0">{{ count($product_is_approved) }}</h3>
                        <p class="text-secondary my-0 text-sm">Jumlah Produk yang Sudah diproses</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5>Produk Terdaftar</h5>
                        <a href="{{ route('show-sertifikasi') }}"
                            class="btn btn-sm btn-primary rounded-pill px-4">View All</a>
                    </div>
                    <table class="table table-striped mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($product as $item)
                                @if ($loop->iteration > 5)
                                @break
                            @endif
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->nama_produk }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge badge-pill badge-danger">Belum Diverifikasi</span>
                                    @elseif($item->status == 2)
                                        <span class="badge badge-pill badge-warning">Sedang Diverifikasi</span>
                                    @elseif($item->status == 3)
                                        <span class="badge badge-pill badge-success">Terverifikasi</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-12">
            <div class="card">
                <div class="card-body">
                    <h5>Produk Tersertifikasi</h5>
                    @foreach ($product_is_approved as $item)
                        <div class="list-group list-group-flush mt-3">
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $item->nama_produk }}</h5>
                                    <small>{{ \Carbon\Carbon::parse($item->tgl_masa_berlaku)->locale('id')->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1">{{ $item->deskripsi_produk }}</p>
                                <small>{{ \Carbon\Carbon::parse($item->tgl_approve)->locale('id')->diffForHumans() }}</small>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    @foreach ($product_is_approved as $item)
        @php
            $now = \Carbon\Carbon::now()->toDateString();
            $date_interval = \Carbon\Carbon::parse($item->tgl_masa_berlaku)
                ->subMonth(12)
                ->format('M, Y')
                ->toDateString();
        @endphp
        @dump($date_interval)
        @if ($now == $date_interval)
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Anda Memiliki Sertifikasi yang Berlaku 2 Bulan Lagi!',
                        text: 'Silahkan Lakukan Perpanjangan Sertifikasi',
                        timer: 5000,
                        timerProgressBar: true,
                    });
                });

            </script>
        @endif
    @endforeach
@endsection
