<div>
    <div class="card card-outline card-teal p-4">
        <div class="card-body setup-content">

            <div class="col-md-12">
                <h3>Informasi Fasilitas Produksi</h3>
                <hr>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Perusahaan</label>
                    <select class="form-control" wire:model="company_id">
                        <option value="">Select Company</option>
                        @foreach ($company as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_perusahaan }}</option>
                        @endforeach
                    </select>
                </div>
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
                        <input type="text" wire:model="jabatan3" class="form-control form-control-sm" id="jabatan3"
                            placeholder="Jabatan...">
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
                        <input type="text" wire:model="no_telp3" class="form-control form-control-sm" id="no_telp3"
                            placeholder="No Telp ...">
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
                    wire:click="uploadPlant">Upload</button>
            </div>
        </div>
    </div>
</div>
