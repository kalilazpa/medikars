@extends('layouts.app')

@section('title', 'Tambah Dokter - Medikars')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Dokter</h1>
    </div>

    <div class="card">

        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Tambah Data Dokter</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.dokter.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="nama">Nama Dokter</label>

                    <input type="text"
                           name="nama"
                           id="nama"
                           class="form-control"
                           value="{{ old('nama') }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="spesialisasi">Spesialisasi</label>

                    <input type="text"
                           name="spesialisasi"
                           id="spesialisasi"
                           class="form-control"
                           value="{{ old('spesialisasi') }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="nomor_telepon">Nomor Telepon</label>

                    <input type="text"
                           name="nomor_telepon"
                           id="nomor_telepon"
                           class="form-control"
                           value="{{ old('nomor_telepon') }}"
                           required>
                </div>

                <div class="mt-4">

                    <a href="{{ route('admin.dokter.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection