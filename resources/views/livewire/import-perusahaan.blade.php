<div>
    <div class="card card-outline card-teal p-4">
        <div class="card-body setup-content">
            {{-- Informasi Perusahaan --}}
            <div class=" col-md-12">
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
                        <input type="text" wire:model="no_siup" class="form-control form-control-sm" id="no_siup"
                            placeholder="No. SIUP ...">
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
                        <input type="text" wire:model="no_npwp" class="form-control form-control-sm" id="no_npwp"
                            placeholder="No. NPWP ...">
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
                            <input class="form-check-input" type="radio" name="sertifikasi_ekolabel" id="radio_yes"
                                value="0" wire:model="sertifikasi_ekolabel">
                            <label class="form-check-label">Iya</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sertifikasi_ekolabel" id="radio_tidak"
                                value="1" wire:model="sertifikasi_ekolabel">
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
                            <input type="text" wire:model="nama1" class="form-control form-control-sm" id="nama1"
                                placeholder="Nama ...">
                            @error('nama1') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        {{-- Jabatan --}}
                        <div class="cp col-lg-6 col-md-12 col-12 px-0">
                            <input type="text" wire:model="jabatan1" class="form-control form-control-sm" id="jabatan1"
                                placeholder="Jabatan...">
                            @error('jabatan1') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{-- Nomor WA --}}
                        <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                            <input type="text" wire:model="no_hp1" class="form-control form-control-sm" id="no_hp1"
                                placeholder="No Handphone (WA) ...">
                            @error('no_hp1') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        {{-- Email --}}
                        <div class="cp col-lg-6 col-md-12 col-12 px-0">
                            <input type="email" wire:model="email1" class="form-control form-control-sm" id="email1"
                                placeholder="Email...">
                            @error('email1') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{-- No Telp --}}
                        <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                            <input type="text" wire:model="no_telp1" class="form-control form-control-sm" id="no_telp1"
                                placeholder="No Telp ...">
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
                            <input type="text" wire:model="nama2" class="form-control form-control-sm" id="nama2"
                                placeholder="Nama ...">
                            @error('nama2') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        {{-- Jabatan --}}
                        <div class="cp col-lg-6 col-md-12 col-12 px-0">
                            <input type="text" wire:model="jabatan2" class="form-control form-control-sm" id="jabatan2"
                                placeholder="Jabatan...">
                            @error('jabatan2') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{-- Nomor WA --}}
                        <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                            <input type="text" wire:model="no_hp2" class="form-control form-control-sm" id="no_hp2"
                                placeholder="No Handphone (WA) ...">
                            @error('no_hp2') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        {{-- Email --}}
                        <div class="cp col-lg-6 col-md-12 col-12 px-0">
                            <input type="email" wire:model="email2" class="form-control form-control-sm" id="email2"
                                placeholder="Email...">
                            @error('email2') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {{-- No Telp --}}
                        <div class="cp col-lg-6 col-md-12 col-12 pl-0">
                            <input type="text" wire:model="no_telp2" class="form-control form-control-sm" id="no_telp2"
                                placeholder="No Telp ...">
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
                    wire:click="uploadPerusahaan">Upload</button>
            </div>
        </div>
    </div>
</div>
