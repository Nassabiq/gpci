@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        @foreach (Auth::user()->roles as $role)
            @switch($role->name)
                @case('client')
                    @livewire('dashboard.client-dashboard')
                @break
                @case('verifikator')
                    @livewire('dashboard.verifikator-dashboard')
                @break
                @case('admin')
                    @livewire('dashboard.admin-dashboard')
                @break
                @default
                    @livewire('dashboard.admin-dashboard')
            @endswitch
        @endforeach
    </div>
@endsection
