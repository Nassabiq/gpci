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
                @case('visitor')
                    @livewire('dashboard.visitor-dashboard')
                @break
                @default
                    @livewire('dashboard.admin-dashboard')
            @endswitch
        @endforeach
    </div>
@endsection
@section('js')
@if (session()->has('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: {{ session('success') }}
        })

    </script>
@endif
@endsection
