@extends('adminlte::page')
@section('title', 'Import Data')
@section('content')
    <div class="container">
        <h2>Import Data</h2>
        <hr>
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12 mb-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                        href="#list-home" role="tab" aria-controls="home">Import Data Perusahaan</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                        href="#list-profile" role="tab" aria-controls="profile">Import Data Plant</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                        href="#list-messages" role="tab" aria-controls="messages">Import Data Produk</a>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-12">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        @livewire('import-perusahaan')
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        @livewire('import-plant')
                    </div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                        @livewire('import-produk')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
