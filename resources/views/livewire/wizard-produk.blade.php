<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-lg-4 header">
            <div class="vrtwiz card">
                <ul class="verticalwiz card-body container mt-4">
                    <li class="{{ $currentStep != 1 ? '' : 'active' }} d-flex">
                        <a href="#"> <span class="step">1</span> </a>
                        <p class="title">Informasi Produk</p>
                    </li>
                    <li class="{{ $currentStep != 2 ? '' : 'active' }} d-flex">
                        <a href="#"> <span class="step">2</span> </a>
                        <p class="title">Submission</p>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-8 card card-outline card-teal">
            <div class="container p-4">
                <div class="card-body setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step1">
                    {{-- Informasi Produk --}}
                    <div class="col-md-12">
                        <h3>Informasi Produk</h3>
                        <hr>
                        {{-- Nama Pabrik --}}
                        <div class="form-group row">
                            <label>Nama Pabrik:</label>
                            <select class="form-control form-control-sm" wire:model="nama_pabrik" id="nama_pabrik"
                                onchange="val()">
                                <option>Nama Pabrik</option>
                                @if ($company)
                                    @foreach ($company->factories as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_fasilitas }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('jenis_sertifikasi') <span class="error">{{ $message }}</span> @enderror
                        </div>
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


                        <button class="btn btn-primary nextBtn next-button pull-right" wire:click="firstStepSubmit"
                            type="button">Next <i class="fas fa-long-arrow-alt-right pl-2"></i></button>
                    </div>
                </div>
                <div class="card-body setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step2">
                    <div class="col-md-12 konfirmasi">
                        <h3>Konfirmasi Pendaftaran Sertifikasi</h3>
                        <hr>

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
                            wire:click="back(1)"><i class="fas fa-long-arrow-alt-left pr-2"></i> Back</button>
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

@section('js')
    <script>
        $(".nextBtn").click(function(e) {
            $(document).scrollTop(0)
        });

        $(document).ready(function() {
            $("#modalProduk").modal('show');
        });

        function val() {
            var pabrik = document.getElementById('nama_pabrik');
            var str = pabrik.options[pabrik.selectedIndex].text;
        }

    </script>
@endsection
