<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-lg-4 header">
            <div class="vrtwiz card">
                <ul class="verticalwiz card-body container mt-4">
                    <li class="{{ $currentStep != 1 ? '' : 'active' }} d-flex">
                        <a href="#"> <span class="step">1</span> </a>
                        <p class="title">Informasi Fasilitas Produksi</p>
                    </li>
                    <li class="{{ $currentStep != 2 ? '' : 'active' }} d-flex">
                        <a href="#"> <span class="step">2</span> </a>
                        <p class="title">Informasi Produk</p>
                    </li>
                    <li class="{{ $currentStep != 3 ? '' : 'active' }} d-flex">
                        <a href="#"> <span class="step">3</span> </a>
                        <p class="title">Submission</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-8 card card-outline card-teal">
            
            <div class="container p-4">
                <div class="card-body setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step1">

                    <div class="col-md-12">
                        <h3>Informasi Fasilitas Produksi</h3>
                        <hr>

                        {{-- Nama Perusahaan --}}
                        @if ($company)
                            <p><b> Nama Perusahaan </b> : {{ $company->nama_perusahaan }}</p>
                        @endif
                        {{-- Nama Pabrik --}}
                        <div class="form-group row">
                            <label>Nama Pabrik:</label>
                            <input type="text" wire:model="nama_fasilitas" class="form-control form-control-sm"
                                id="nama_fasilitas" placeholder="Nama Pabrik ...">
                            @error('nama_fasilitas') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Email Factory --}}
                        <div class="form-group row">
                            <label>Email:</label>
                            <input type="email" wire:model="email_fasilitas" class="form-control form-control-sm"
                                id="email_fasilitas" placeholder="Email Pabrik ...">
                            @error('email_fasilitas') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="form-group row">
                            <label>Alamat Pabrik:</label>
                            <input type="text" wire:model="alamat_fasilitas" class="form-control form-control-sm"
                                id="alamat_fasilitas" placeholder="Alamat Pabrik ...">
                            @error('alamat_fasilitas') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        {{-- No Telp & Fax --}}
                        <div class="row">
                            <div class="form-group col-lg-2 col-md-2 col-sm-12 pl-0">
                                <label for="title">Kode Pos:</label>
                                <input type="text" wire:model="kodepos_fasilitas" class="form-control form-control-sm"
                                    id="kodepos_fasilitas" placeholder="Kode Pos...">
                                @error('kodepos_fasilitas') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-5 col-md-5 col-sm-6 col-6 pl-0">
                                <label for="title">No Telp:</label>
                                <input type="text" wire:model="no_telp_fasilitas" class="form-control form-control-sm"
                                    id="no_telp_fasilitas" placeholder="No. Telp ...">
                                @error('no_telp_fasilitas') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-5 col-md-5 col-sm-6 col-6 pl-0">
                                <label for="title">Fax:</label>
                                <input type="text" wire:model="fax_fasilitas" class="form-control form-control-sm"
                                    id="fax_fasilitas" placeholder="Fax ...">
                                @error('fax_fasilitas') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Contact Person --}}
                        <div class="form-group row">
                            <label class="col-12 px-0">Contact Person:</label> <br>
                            {{-- Nama --}}
                            <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                                <input type="text" wire:model="nama3" class="form-control form-control-sm" id="nama3"
                                    placeholder="Nama ...">
                                @error('nama3') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            {{-- Jabatan --}}
                            <div class="cp col-lg-6 col-md-12 col-12 px-0">
                                <input type="text" wire:model="jabatan3" class="form-control form-control-sm"
                                    id="jabatan3" placeholder="Jabatan...">
                                @error('jabatan3') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- Nomor WA --}}
                            <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                                <input type="text" wire:model="no_hp3" class="form-control form-control-sm" id="no_hp3"
                                    placeholder="No Handphone (WA) ...">
                                @error('no_hp3') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            {{-- Email --}}
                            <div class="cp col-lg-6 col-md-12 col-12 px-0">
                                <input type="email" wire:model="email3" class="form-control form-control-sm" id="email3"
                                    placeholder="Email...">
                                @error('email3') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            {{-- No Telp --}}
                            <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                                <input type="text" wire:model="no_telp3" class="form-control form-control-sm"
                                    id="no_telp3" placeholder="No Telp ...">
                                @error('no_telp3') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            {{-- Fax --}}
                            <div class="cp col-lg-6 col-md-12 col-12 px-0">
                                <input type="text" wire:model="fax3" class="form-control form-control-sm" id="fax3"
                                    placeholder="No Fax...">
                                @error('fax3') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <button class="btn btn-primary nextBtn pull-right next-button" type="submit"
                            wire:click="firstStepSubmit">Next <i class="fas fa-long-arrow-alt-right pl-2"></i></button>
                    </div>
                </div>
                <div class="card-body setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step2">
                    {{-- Informasi Produk --}}
                    <div class="col-md-12">
                        <h3>Informasi Produk</h3>
                        <hr>
                        {{-- Nama Produk --}}
                        <div class="form-group row">
                            <label>Nama Produk:</label>
                            <input type="text" wire:model="nama_produk" class="form-control form-control-sm"
                                id="nama_produk" placeholder="Nama Produk ...">
                            @error('nama_produk') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group row">
                            <label>Tipe / Model:</label>
                            <input type="text" wire:model="tipe_model" class="form-control form-control-sm"
                                id="tipe_model" placeholder="Tipe / Model ...">
                            @error('tipe_model') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group row">
                            {{-- Dimensi (P x L x T) --}}
                            <div class="cp col-lg-3 col-md-12 col-12 pl-0">
                                <label>Dimensi (P x L x T)</label>
                                <input type="text" wire:model="ukuran" class="form-control form-control-sm" id="ukuran"
                                    placeholder="Ukuran...">
                                @error('ukuran') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            {{-- Merk Dagang --}}
                            <div class="cp col-lg-9 col-md-12 col-12 px-0">
                                <label>Merk Dagang:</label>
                                <input type="text" wire:model="merk_dagang" class="form-control form-control-sm"
                                    id="merk_dagang" placeholder="Merk Dagang...">
                                @error('merk_dagang') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Deskripsi Produk --}}
                        <div class="form-group row">
                            <label>Deskripsi Produk:</label>
                            <textarea class="form-control" id="deskripsi" rows="3"
                                wire:model="deskripsi_produk"></textarea>
                            @error('deskripsi_produk') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Produk yang akan disertifikasi --}}
                        <div class="form-group row">
                            <label>Produk yang akan disertifikasi:</label>
                            <select class="custom-select custom-select-sm" wire:model="kategori_produk"
                                id="inputGroupSelect02">
                                <option value="">Choose...</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->categories }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Jenis Sertifikasi --}}
                        <div class="form-group row">
                            <label>Jenis Sertifikasi :</label>
                            <select class="form-control form-control-sm" wire:model="jenis_sertifikasi">
                                <option>Jenis Sertifikasi</option>
                                <option value="1">Pengajuan Baru</option>
                                <option value="2">Perpanjangan</option>
                            </select>
                            @error('jenis_sertifikasi') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Foto Produk --}}
                        <label>Foto Produk / Kemasan:</label>
                        <div class="input-group mb-3 mx-0">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto_produk[]" accept="image/*"
                                    wire:model="foto_produk" multiple id="photoproduk">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        @foreach ($foto_produk as $photos)
                            <div class="card d-inline-block">
                                @if ($photos)
                                    <div class="card-body">
                                        <img width="150px" height="150px" style="object-fit: cover"
                                            src="{{ $photos->temporaryUrl() }}">
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        @error('foto_produk.*') <span class="error">{{ $message }}</span> @enderror

                        {{-- <div class="gallery" id="gallery"></div> --}}
                        {{-- Tipe Pengemasan dan Ukuran --}}
                        <div class="form-group row">
                            <label>Tipe Pengemasan dan Ukuran:</label>
                            <input type="text" wire:model="tipe_pengemasan" class="form-control form-control-sm"
                                id="tipe_pengemasan" placeholder="Tipe Pengemasan dan Ukuran ...">
                            @error('tipe_pengemasan') <span class="error">{{ $message }}</span> @enderror
                        </div>


                        <button class="btn btn-primary nextBtn next-button pull-right" wire:click="secondStepSubmit"
                            type="button">Next <i class="fas fa-long-arrow-alt-right pl-2"></i></button>
                        <button class="btn btn-danger nextBtn prev-button pull-right" type="button"
                            wire:click="back(1)"><i class="fas fa-long-arrow-alt-left pr-2"></i> Back</button>
                    </div>
                </div>
                <div class="card-body setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step3">
                    <div class="col-md-12 konfirmasi">
                        <h3>Konfirmasi Pendaftaran Sertifikasi</h3>
                        <hr>
                        <h5>Informasi Fasilitas Produksi</h5>

                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="table-first">Nama Pabrik</td>
                                    <td>:</td>
                                    <td>{{ $nama_fasilitas }}</td>
                                </tr>
                                <tr>
                                    <td class="table-first">Alamat</td>
                                    <td>:</td>
                                    <td>{{ $alamat_fasilitas }}</td>
                                </tr>
                                <tr>
                                    <td class="table-first">Kategori Produk</td>
                                    <td>:</td>
                                    <td>{{ $kategori_produk }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="table-first">Email</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $email_fasilitas }}</td>

                                    <td class="table-first">Kode Pos</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $kodepos_fasilitas }}</td>
                                </tr>
                                <tr>
                                    <td class="table-first">No Telp</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $no_telp_fasilitas }}</td>

                                    <td class="table-first">Fax</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $fax_fasilitas }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="table-first">Nama</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $nama3 }}</td>

                                    <td class="table-first">Jabatan</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $jabatan3 }}</td>
                                </tr>
                                <tr>
                                    <td class="table-first">No Handphone</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $no_hp3 }}</td>

                                    <td class="table-first">Email</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $email3 }}</td>
                                </tr>
                                <tr>
                                    <td class="table-first">No Telp</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $no_telp3 }}</td>

                                    <td class="table-first">Fax</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $fax3 }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h5>Informasi Produk</h5>

                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="table-first">Nama Produk</td>
                                    <td>:</td>
                                    <td>{{ $nama_produk }}</td>
                                </tr>
                                <tr>
                                    <td class="table-first">Tipe / Model</td>
                                    <td>:</td>
                                    <td>{{ $tipe_model }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="table-first">Ukuran</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $ukuran }}</td>

                                    <td class="table-first">Merk Dagang</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $merk_dagang }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="table-first">Deskripsi Produk</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $deskripsi_produk }}</td>
                                </tr>
                                <tr>
                                    <td class="table-first">Tipe Pengemasan dan Ukuran</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $tipe_pengemasan }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-danger nextBtn prev-button pull-right" type="button"
                            wire:click="back(2)"><i class="fas fa-long-arrow-alt-left pr-2"></i> Back</button>
                        <button class="btn btn-primary nextBtn next-button pull-right" type="button"
                            wire:click="submitForm" wire:loading.attr="disabled" wire:loading.class="btn-secondary"
                            wire:loading.class.remove="btn-primary">
                            <div wire:loading>
                                Loading...
                            </div>
                            <div wire:loading.remove>
                                Submit
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalProduk" data-backdrop="static" data-keybooard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h6 class="text-center">Apakah Anda ingin Menambahkan Fasilitas Produksi Baru ?</h6>
            </div>
            <div class="modal-footer mx-auto">
                <a href="{{ route('add-produk') }}" class="btn btn-secondary">Tidak</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Iya</button>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        $(".nextBtn").click(function(e) {
            $(document).scrollTop(0)
        });

        $(document).ready(function() {
            $("#modalProduk").modal('show');
        });

    </script>
@endsection
