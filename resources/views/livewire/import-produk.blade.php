<div>
    <div class="card card-outline card-teal p-4">
        <div class="card-body setup-content">
            {{-- Informasi Produk --}}
            {{-- @dump($plant) --}}
            <div class="col-md-12">
                <h3>Informasi Produk</h3>
                <hr>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Nama Plant</label>
                    <select class="form-control" wire:model="plant_id">
                        <option value="">Select Plant</option>
                        @foreach ($plant as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_fasilitas }} -
                                {{ $item->perusahaan->nama_perusahaan }}</option>

                        @endforeach
                    </select>
                </div>
                {{-- Nama Produk --}}
                <div class="form-group row">
                    <label>Nama Produk:</label>
                    <input type="text" wire:model="nama_produk" class="form-control form-control-sm" id="nama_produk"
                        placeholder="Nama Produk ...">
                    @error('nama_produk') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group row">
                    <label>Tipe / Model:</label>
                    <input type="text" wire:model="tipe_model" class="form-control form-control-sm" id="tipe_model"
                        placeholder="Tipe / Model ...">
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
                    <textarea class="form-control" id="deskripsi" rows="3" wire:model="deskripsi_produk"></textarea>
                    @error('deskripsi_produk') <span class="error">{{ $message }}</span> @enderror
                </div>

                {{-- Produk yang akan disertifikasi --}}
                <div class="form-group row">
                    <label>Produk yang akan disertifikasi:</label>
                    <select class="custom-select custom-select-sm" wire:model="kategori_produk" id="inputGroupSelect02">
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
                <div class="form-group row">
                    <label>Tipe Pengemasan dan Ukuran:</label>
                    <input type="text" wire:model="tipe_pengemasan" class="form-control form-control-sm"
                        id="tipe_pengemasan" placeholder="Tipe Pengemasan dan Ukuran ...">
                    @error('tipe_pengemasan') <span class="error">{{ $message }}</span> @enderror
                </div>


                <button class="btn btn-primary nextBtn next-button pull-right" wire:click="uploadProduk"
                    type="button">Submit</button>
            </div>
        </div>
    </div>
</div>
