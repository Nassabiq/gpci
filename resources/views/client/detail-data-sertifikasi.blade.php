@extends('adminlte::page')
@section('title', 'Data Sertifikasi')
@section('content')
    <div class="container">
        <h2>Data Sertifikasi</h2>
        <div class="wrap-table mt-4">
            @if (!$company)
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="lead text-center">Belum Ada Data Sertifikasi yang Didaftarkan</p>
                    </div>
                </div>
            @else
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <th class="table-first">Nama Perusahaan</th>
                            <td class="table-second">:</td>
                            <td>{{ $company->nama_perusahaan }}</td>
                        </tr>
                        <tr>
                            <th class="table-first">Alamat</th>
                            <td class="table-second">:</td>
                            <td>{{ $company->alamat_perusahaan }}</td>
                        </tr>
                        <tr>
                            <th class="table-first">Email</th>
                            <td class="table-second">:</td>
                            <td>{{ $company->email_perusahaan }}</td>
                        </tr>
                    </tbody>
                </table>
                @php
                    $contact = json_decode($company->contact);
                @endphp
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-success" id="spin" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <table class="table table-sm" id="nextdesc">
                    <tbody>
                        <tr>
                            <th class="table-first">No Telp</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $company->no_telp_perusahaan }}</td>

                            <th class="table-first">Kode Pos</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $company->kodepos_perusahaan }} </td>
                        </tr>
                        <tr>
                            <th class="table-first">No Fax</th>
                            <td class="table-second">:</td>
                            <td class="table-third">
                                @if ($company->fax_perusahaan)
                                    {{ $company->fax_perusahaan }}
                                @endif
                            </td>

                            <th class="table-first">No Akta Notaris</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $company->no_akta_notaris }} </td>
                        </tr>
                        <tr>
                            <th class="table-first">No SIUP</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $company->no_siup }}</td>

                            <th class="table-first">No TDP</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $company->no_tdp }} </td>
                        </tr>
                        <tr>
                            <th class="table-first">No NPWP</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $company->no_npwp }}</td>

                            <th class="table-first">No API</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $company->no_api }} </td>
                        </tr>
                        <tr>
                            <th class="table-first">Lembaga Ekolabel</th>
                            <td class="table-second">:</td>
                            <td class="table-third">
                                @if ($company->lembaga_ekolabel)
                                    {{ $company->fax_perusahaan }}
                                @endif
                            </td>

                            <th class="table-first">Website Perusahaan</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $company->website_perusahaan }} </td>
                        </tr>
                        <tr>
                            <td class="table-first">Contact Person: </td>
                        </tr>
                        <tr>
                            <th class="table-first">Nama</th>
                            <td class="table-second">:</td>
                            <td class="table-third">
                                {{ $contact->cp_1->nama }}
                            </td>

                            <th class="table-first">Jabatan</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $contact->cp_1->jabatan }} </td>
                        </tr>
                        <tr>
                            <th class="table-first">No Telp</th>
                            <td class="table-second">:</td>
                            <td class="table-third">
                                {{ $contact->cp_1->no_telp }}
                            </td>

                            <th class="table-first">Email</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $contact->cp_1->email }} </td>
                        </tr>
                        <tr>
                            <th class="table-first">No Handphone</th>
                            <td class="table-second">:</td>
                            <td class="table-third">
                                {{ $contact->cp_1->no_hp }}
                            </td>

                            <th class="table-first">No Fax</th>
                            <td class="table-second">:</td>
                            <td class="table-third">{{ $contact->cp_1->fax }} </td>
                        </tr>
                        @if ($contact->cp_2->nama2)
                            <tr>
                                <td class="table-first">Contact Person 2: </td>
                            </tr>

                            <tr>
                                <th class="table-first">Nama</th>
                                <td class="table-second">:</td>
                                <td class="table-third">
                                    {{ $contact->cp_2->nama2 }}
                                </td>

                                @if ($contact->cp_2->jabatan2)
                                    <th class="table-first">Jabatan</th>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $contact->cp_2->jabatan2 }} </td>
                                @endif
                        @endif
                        </tr>
                        <tr>
                            @if ($contact->cp_2->no_telp2)
                                <th class="table-first">No Telp</th>
                                <td class="table-second">:</td>
                                <td class="table-third">
                                    {{ $contact->cp_2->no_telp2 }}
                                </td>
                            @endif

                            @if ($contact->cp_2->email2)
                                <th class="table-first">Email</th>
                                <td class="table-second">:</td>
                                <td class="table-third">{{ $contact->cp_2->email2 }} </td>
                            @endif
                        </tr>
                        <tr>
                            @if ($contact->cp_2->no_hp2)
                                <th class="table-first">No Handphone</th>
                                <td class="table-second">:</td>
                                <td class="table-third">
                                    {{ $contact->cp_2->no_hp2 }}
                                </td>
                            @endif

                            @if ($contact->cp_2->fax2)
                                <th class="table-first">No Fax</th>
                                <td class="table-second">:</td>
                                <td class="table-third">{{ $contact->cp_2->fax2 }} </td>
                            @endif
                        </tr>
                    </tbody>

                </table>
                {{-- @dump(Storage::url('foto_produk')) --}}
                <div class="row justify-content-between mt-3 pb-3">
                    <div class="col-lg-3 col-6">
                        <button type="button" class="btn btn-sm btn-primary" id="showDesc" onclick="showDesc(this)">Data
                            Lengkap
                            <i class="fas fa-chevron-down showdesc pl-2" id="fa-icon"></i></button>
                    </div>
                    <div class="col-lg-2 col-5">
                        <select class="custom-select" onchange="showData(this)">
                            <option value="1">Produk</option>
                            <option value="2">Fasilitas Produksi</option>
                        </select>
                    </div>
                </div>
                <div id="dataProduk">
                    <div class="table-responsive-md">
                        <table class="table table-bordered w-100">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Pabrik</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($company->factories as $item)
                                    @foreach ($item->produk as $produk)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $produk->nama_produk }}</td>
                                            <td>{{ $produk->deskripsi_produk }}</td>
                                            <td>{{ $item->nama_fasilitas }}</td>
                                            <td>
                                                @if ($produk->status == 1)
                                                    <span class="badge badge-pill badge-danger">Belum Diverifikasi</span>
                                                @elseif($produk->status == 2)
                                                    <span class="badge badge-pill badge-warning">Sedang Diverifikasi</span>
                                                @elseif($produk->status == 3)
                                                    <span class="badge badge-pill badge-success">Terverifikasi</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="collapse"
                                                    data-target="#detail-{{ $produk->id }}">
                                                    <i class="fas fa-fw fa-info-circle"></i>
                                                    Detail
                                                </button>
                                                @if ($produk->status == 3)
                                                    <a href="/cetak-pdf/{{ $produk->id }}" target="_blank" type="button"
                                                        class="btn btn-sm btn-warning">
                                                        Cetak Sertifikat
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="collapse" id="detail-{{ $produk->id }}">
                                                <label>Foto Produk</label>
                                                <div class="d-flex">
                                                    <div class="col-lg-6 col-md-12">
                                                        @php
                                                            $images = json_decode($produk->foto_produk);
                                                        @endphp
                                                        @foreach ($images as $image)
                                                            <a href="#" class="imagemodal">
                                                                <img src="{{ Storage::url('foto_produk/' . $company->nama_perusahaan . '/' . $image) }}"
                                                                    alt="{{ $produk->nama_produk }}" width="200px"
                                                                    height="200px"
                                                                    class="border border-primary rounded mx-2 mb-2">
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <b>Jenis Sertifikasi</b> :
                                                                {{ $produk->jenis_sertifikasi == 1 ? 'Pengajuan Baru' : 'Perpanjangan' }}
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Tipe Model</b> : {{ $produk->tipe_model }}
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Merk Dagang</b> : {{ $produk->merk_dagang }}
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Tipe Pengemasan</b> : {{ $produk->tipe_pengemasan }}
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Ukuran</b> : {{ $produk->ukuran }}
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Tanggal Pendaftaran</b> :
                                                                {{ \Carbon\Carbon::parse($produk->tgl_pendaftaran)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                                            </li>
                                                            @if ($produk->status == 3)
                                                                <li class="list-group-item">
                                                                    <b>Masa Berlaku s/d</b> :
                                                                    {{ \Carbon\Carbon::parse($produk->tgl_masa_berlaku)->locale('id')->isoFormat('dddd, D MMMM Y') }}
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="imagepreview" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img src="" id="image-full" style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="dataPabrik">
                    <div class="table-responsive-md">
                        <table class="table table-bordered w-100">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Fasilitas</th>
                                    <th scope="col">No. Telp</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Kode Pos</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $no2 = 1;
                                @endphp
                                @foreach ($company->factories as $pabrik)
                                    <tr>
                                        <th scope="row">{{ $no2++ }}</th>
                                        <td>{{ $pabrik->nama_fasilitas }}</td>
                                        <td>{{ $pabrik->no_telp_fasilitas }}</td>
                                        <td>{{ $pabrik->email_fasilitas }}</td>
                                        <td>{{ $pabrik->kodepos_fasilitas }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="collapse"
                                                data-target="#detail-plant-{{ $pabrik->id }}">
                                                <i class="fas fa-fw fa-info-circle"></i>
                                                Detail
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="collapse" id="detail-plant-{{ $pabrik->id }}">
                                            <div class="d-flex">
                                                <div class="col-lg-6 col-md-12">
                                                    <ul class="list-group shadow">
                                                        <li class="list-group-item">
                                                            <b>No Fax</b> :
                                                            {{ $pabrik->fax_fasilitas }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Alamat</b> : {{ $pabrik->alamat_fasilitas }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Kode Pos</b> : {{ $pabrik->kodepos_fasilitas }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Contact</b> :
                                                            @php
                                                                $plant_contact = json_decode($pabrik->contact);
                                                            @endphp
                                                            <ul>
                                                                <li><b>Nama</b> : {{ $plant_contact->nama }}</li>
                                                                <li><b>Jabatan</b> : {{ $plant_contact->jabatan }}</li>
                                                                <li><b>No HP</b> : {{ $plant_contact->no_hp }}</li>
                                                                <li><b>Email</b> : {{ $plant_contact->email }}</li>
                                                                <li><b>No Telp</b> : {{ $plant_contact->no_telp }}</li>
                                                                <li><b>Fax</b> : {{ $plant_contact->fax }}</li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $('.imagemodal').on('click', function() {
                $('#image-full').attr('src', $(this).find('img').attr('src'));
                $('#imagepreview').modal('show');
            });
        });

    </script>
@endsection
