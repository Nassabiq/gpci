<div>
    <div class="row">
        <div class="col-lg-4 header">
            <div class="vrtwiz card">
                <ul class="verticalwiz card-body container mt-4">
                    <li class="{{ $currentStep != 1 ? '' : 'active' }} d-flex">
                        <a href="#" class="active"> <span class="step">1</span></a>
                        <p class="title">Informasi Perusahaan</p>
                    </li>
                    <li class="{{ $currentStep != 2 ? '' : 'active' }} d-flex">
                        <a href="#"> <span class="step">2</span> </a>
                        <p class="title">Informasi Fasilitas Produksi</p>
                    </li>
                    <li class="{{ $currentStep != 3 ? '' : 'active' }} d-flex">
                        <a href="#"> <span class="step">3</span> </a>
                        <p class="title">Informasi Produk</p>
                    </li>
                    <li class="{{ $currentStep != 4 ? '' : 'active' }} d-flex">
                        <a href="#"> <span class="step">4</span> </a>
                        <p class="title">Submission</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-8 card card-outline card-teal">
            <div class="container p-4">
                <div class="card-body setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step1">
                    {{-- Informasi Perusahaan --}}
                    <div class="col-md-12">
                        <h3 class="mx-0">Informasi Perusahaan</h3>
                        <hr>
                        {{-- Nama Perusahaan --}}
                        <div class="form-group row">
                            <label>Nama Perusahaan:</label>
                            <input type="text" wire:model="nama_perusahaan" class="form-control form-control-sm"
                                id="nama_perusahaan" placeholder="Nama Perusahaan ...">
                            @error('nama_perusahaan') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Email Company --}}
                        <div class="form-group row">
                            <label>Email:</label>
                            <input type="email" wire:model="email_perusahaan" class="form-control form-control-sm"
                                id="email_perusahaan" placeholder="Email Perusahaan ...">
                            @error('email_perusahaan') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="form-group row">
                            <label>Alamat Perusahaan:</label>
                            <input type="text" wire:model="alamat_perusahaan" class="form-control form-control-sm"
                                id="alamat_perusahaan" placeholder="Alamat Perusahaan ...">
                            @error('alamat_perusahaan') <span class="error">{{ $message }}</span> @enderror
                        </div>


                        {{-- No Telp & Fax --}}
                        <div class="row">
                            <div class="form-group col-lg-2 col-md-2 col-sm-12 pl-0">
                                <label for="title">Kode Pos:</label>
                                <input type="text" wire:model="kodepos_perusahaan" class="form-control form-control-sm"
                                    id="kodepos_perusahaan" placeholder="Kode Pos...">
                                @error('kodepos_perusahaan') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-5 col-md-5 col-sm-6 col-6 pl-0">
                                <label for="title">No Telp:</label>
                                <input type="text" wire:model="no_telp_perusahaan" class="form-control form-control-sm"
                                    id="no_telp_perusahaan" placeholder="No. Telp ...">
                                @error('no_telp_perusahaan') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-5 col-md-5 col-sm-6 col-6 pl-0">
                                <label for="title">Fax:</label>
                                <input type="text" wire:model="fax_perusahaan" class="form-control form-control-sm"
                                    id="fax_perusahaan" placeholder="Fax ...">
                                @error('fax_perusahaan') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- No Akta Notaris dan SIUP --}}
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 pl-0">
                                <label for="title">No Akta Notaris:</label>
                                <input type="text" wire:model="no_akta_notaris" class="form-control form-control-sm"
                                    id="no_akta_notaris" placeholder="No. Akta Notaris ...">
                                @error('no_akta_notaris') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12 pl-0">
                                <label for="title">No. Surat Izin Usaha Perdagangan (SIUP):</label>
                                <input type="text" wire:model="no_siup" class="form-control form-control-sm"
                                    id="no_siup" placeholder="No. SIUP ...">
                                @error('no_siup') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- No TDP dan NPWP --}}
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-12 pl-0">
                                <label for="title">No. Tanda Daftar Perusahaan (TDP):</label>
                                <input type="text" wire:model="no_tdp" class="form-control form-control-sm" id="no_tdp"
                                    placeholder="No. TDP ...">
                                @error('no_tdp') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-12 pl-0">
                                <label for="title">NPWP:</label>
                                <input type="text" wire:model="no_npwp" class="form-control form-control-sm"
                                    id="no_npwp" placeholder="No. NPWP ...">
                                @error('no_npwp') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- No API --}}
                        <div class="form-group row">
                            <label>No. Angka Pengenal Importir(API):</label>
                            <input type="text" wire:model="no_api" class="form-control form-control-sm" id="no_api"
                                placeholder="No. API ...">
                            @error('no_api') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Ekolabel --}}
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-6 col-12 pl-0">
                                <label for="title">Apakah Anda Pernah Mendaftar Sertifikasi Ekolabel?</label> <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sertifikasi_ekolabel"
                                        id="radio_yes" value="0" wire:model="sertifikasi_ekolabel">
                                    <label class="form-check-label">Iya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sertifikasi_ekolabel"
                                        id="radio_tidak" value="1" wire:model="sertifikasi_ekolabel">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-12 pl-0  {{ $sertifikasi_ekolabel != 0 ? 'displayNone' : '' }}"
                                id="lembaga">
                                <label for="title">Jika Pernah, Sebutkan Nama Lembaganya: <sup
                                        class="text-danger">*optional</sup></label>
                                <input type="text" wire:model="lembaga_ekolabel" class="form-control form-control-sm"
                                    id="lembaga_ekolabel" placeholder="Lembaga Ekolabel..." value="2">
                                @error('lembaga_ekolabel') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        {{-- Website Perusahaan --}}
                        <div class="form-group row">
                            <label>Website Perusahaan:</label>
                            <input type="text" wire:model="website_perusahaan" class="form-control form-control-sm"
                                id="website_perusahaan" placeholder="Website Perusahaan ...">
                            @error('website_perusahaan') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Contact Person --}}
                        <div class="contact-person-1">
                            <div class="form-group row">
                                <label class="col-12 px-0">Contact Person 1:</label> <br>
                                {{-- Nama --}}
                                <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                                    <input type="text" wire:model="nama1" class="form-control form-control-sm"
                                        id="nama1" placeholder="Nama ...">
                                    @error('nama1') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                {{-- Jabatan --}}
                                <div class="cp col-lg-6 col-md-12 col-12 px-0">
                                    <input type="text" wire:model="jabatan1" class="form-control form-control-sm"
                                        id="jabatan1" placeholder="Jabatan...">
                                    @error('jabatan1') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {{-- Nomor WA --}}
                                <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                                    <input type="text" wire:model="no_hp1" class="form-control form-control-sm"
                                        id="no_hp1" placeholder="No Handphone (WA) ...">
                                    @error('no_hp1') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                {{-- Email --}}
                                <div class="cp col-lg-6 col-md-12 col-12 px-0">
                                    <input type="email" wire:model="email1" class="form-control form-control-sm"
                                        id="email1" placeholder="Email...">
                                    @error('email1') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {{-- No Telp --}}
                                <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                                    <input type="text" wire:model="no_telp1" class="form-control form-control-sm"
                                        id="no_telp1" placeholder="No Telp ...">
                                    @error('no_telp') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                {{-- Fax --}}
                                <div class="cp col-lg-6 col-md-12 col-12 px-0">
                                    <input type="text" wire:model="fax1" class="form-control form-control-sm" id="fax1"
                                        placeholder="No Fax...">
                                    @error('fax1') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="contact-person-2">
                            <div class="form-group row">
                                <label class="col-12 px-0">Contact Person 2: <sup class="text-danger">*optional</sup>
                                </label> <br>
                                {{-- Nama --}}
                                <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                                    <input type="text" wire:model="nama2" class="form-control form-control-sm"
                                        id="nama2" placeholder="Nama ...">
                                    @error('nama2') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                {{-- Jabatan --}}
                                <div class="cp col-lg-6 col-md-12 col-12 px-0">
                                    <input type="text" wire:model="jabatan2" class="form-control form-control-sm"
                                        id="jabatan2" placeholder="Jabatan...">
                                    @error('jabatan2') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {{-- Nomor WA --}}
                                <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                                    <input type="text" wire:model="no_hp2" class="form-control form-control-sm"
                                        id="no_hp2" placeholder="No Handphone (WA) ...">
                                    @error('no_hp2') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                {{-- Email --}}
                                <div class="cp col-lg-6 col-md-12 col-12 px-0">
                                    <input type="email" wire:model="email2" class="form-control form-control-sm"
                                        id="email2" placeholder="Email...">
                                    @error('email2') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {{-- No Telp --}}
                                <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                                    <input type="text" wire:model="no_telp2" class="form-control form-control-sm"
                                        id="no_telp2" placeholder="No Telp ...">
                                    @error('no_telp2') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                {{-- Fax --}}
                                <div class="cp col-lg-6 col-md-12 col-12 px-0">
                                    <input type="text" wire:model="fax2" class="form-control form-control-sm" id="fax2"
                                        placeholder="No Fax...">
                                    @error('fax2') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary nextBtn pull-right next-button" type="button"
                            wire:click="firstStepSubmit">Next <i class="fas fa-long-arrow-alt-right pl-2"></i></button>

                        {{-- <button class="btn btn-danger nextBtn btn-lg pull-right"
                            type="button" wire:click="back(2)">Back</button> --}}
                    </div>
                </div>
                <div class="card-body setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step2">

                    <div class="col-md-12">
                        <h3>Informasi Fasilitas Produksi</h3>
                        <hr>
                        {{-- Nama Perusahaan --}}
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
                            wire:click="secondStepSubmit">Next <i class="fas fa-long-arrow-alt-right pl-2"></i></button>
                        <button type="button" class="btn btn-danger nextBtn pull-right prev-button"
                            wire:click="back(1)"><i class="fas fa-long-arrow-alt-left pr-2"></i> Back</button>
                    </div>
                </div>
                <div class="card-body setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step3">
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
                            {{-- Ukuran --}}
                            <div class="cp col-lg-3 col-md-12 col-12 pl-0">
                                <label>Ukuran</label>
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
                        <label>Foto Produk:</label>
                        <div class="input-group mb-3 mx-0">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" {{-- wire:model="foto_produk" --}} name="foto_produk[]"
                                    accept="image/*" wire:model="foto_produk" multiple id="photoproduk">
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


                        <button class="btn btn-primary nextBtn next-button pull-right" wire:click="thirdStepSubmit"
                            type="button">Next <i class="fas fa-long-arrow-alt-right pl-2"></i></button>
                        <button class="btn btn-danger nextBtn prev-button pull-right" type="button"
                            wire:click="back(2)"><i class="fas fa-long-arrow-alt-left pr-2"></i> Back</button>
                    </div>
                </div>
                <div class="card-body setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step4">
                    <div class="col-md-12 konfirmasi">
                        <h3>Konfirmasi Pendaftaran Sertifikasi</h3>
                        <hr>
                        <h5>Informasi Perusahaan</h5>
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="table-first">Nama Perusahaan</td>
                                    <td>:</td>
                                    <td>{{ $nama_perusahaan }}</td>
                                </tr>
                                <tr>
                                    <td class="table-first">Alamat</td>
                                    <td>:</td>
                                    <td>{{ $alamat_perusahaan }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-6">
                                <table class="table table-sm table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="table-first">Email</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $email_perusahaan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-first">No Telp</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $no_telp_perusahaan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-first">No Akta Notaris</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $no_akta_notaris }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-first">Nomor TDP</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $no_tdp }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-first">Nomor API</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $no_api }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-first">Sertifikasi Ekolabel</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">
                                                {{ $sertifikasi_ekolabel == 0 ? 'Iya' : 'Tidak' }}
                                            </td>

                                            <td class="table-first">Lembaga Ekolabel</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $lembaga_ekolabel }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-first">Website Perusahaan</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $website_perusahaan }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="table-first">Kode Pos</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $kodepos_perusahaan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-first">Fax</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $fax_perusahaan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-first">Nomor SIUP</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $no_siup }}</td>
                                        </tr>
                                        <tr>
                                            <td class="table-first">Nomor NPWP</td>
                                            <td class="table-second">:</td>
                                            <td class="table-third">{{ $no_npwp }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Contact 1 --}}
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="table-first">Nama</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $nama1 }}</td>

                                    <td class="table-first">Jabatan</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $jabatan1 }}</td>
                                </tr>
                                <tr>
                                    <td class="table-first">No Handphone</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $no_hp1 }}</td>

                                    <td class="table-first">Email</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $email1 }}</td>
                                </tr>
                                <tr>
                                    <td class="table-first">No Telp</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $no_telp1 }}</td>

                                    <td class="table-first">Fax</td>
                                    <td class="table-second">:</td>
                                    <td class="table-third">{{ $fax1 }}</td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- Contact 2 --}}
                        <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    @if ($nama2 != null)
                                        <td class="table-first">Nama</td>
                                        <td class="table-second">:</td>
                                        <td class="table-third">{{ $nama2 }}</td>
                                    @endif

                                    @if ($jabatan2 != null)
                                        <td class="table-first">Jabatan</td>
                                        <td class="table-second">:</td>
                                        <td class="table-third">{{ $jabatan2 }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if ($no_hp2 != null)
                                        <td class="table-first">No Handphone</td>
                                        <td class="table-second">:</td>
                                        <td class="table-third">{{ $no_hp2 }}</td>
                                    @endif

                                    @if ($email2 != null)
                                        <td class="table-first">Email</td>
                                        <td class="table-second">:</td>
                                        <td class="table-third">{{ $email2 }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if ($no_telp2 != null)
                                        <td class="table-first">No Telp</td>
                                        <td class="table-second">:</td>
                                        <td class="table-third">{{ $no_telp2 }}</td>
                                    @endif

                                    @if ($fax2 != null)
                                        <td class="table-first">Fax</td>
                                        <td class="table-second">:</td>
                                        <td class="table-third">{{ $fax2 }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>

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
                            wire:click="back(3)"><i class="fas fa-long-arrow-alt-left pr-2"></i> Back</button>
                        <button class="btn btn-primary nextBtn next-button pull-right" type="button"
                            wire:click="submitForm">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('js')
    <script>
        $(".nextBtn").click(function(e) {
            $(document).scrollTop(0)
        });

    </script>
@endsection
