@extends('layouts.app')
@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>

    <div class="py-12">
        <div class="max-w-2xl sm:px-6 lg:px-2 d-flex d-grid gap-5">
            <div class="card">
                <h5 class="card-header">Pengguna Terdaftar</h5>
                <div class="card-body">
                    <h5 class="card-title">{{ $users }}</h5>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header">Pengguna Aktif</h5>
                <div class="card-body">
                    <h5 class="card-title">{{ $users_status }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
