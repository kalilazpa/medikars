@extends('layouts.app')

@section('title', 'Tambah Pasien - Medikars')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Pasien</h1>
</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Data Pasien
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.pasien.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text"
                       name="nama"
                       id="nama"
                       class="form-control"
                       placeholder="Masukkan nama lengkap"
                       value="{{ old('nama') }}"
                       required>
            </div>

            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text"
                       name="nik"
                       id="nik"
                       class="form-control"
                       placeholder="Masukkan NIK"
                       value="{{ old('nik') }}"
                       required>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date"
                       name="tanggal_lahir"
                       id="tanggal_lahir"
                       class="form-control"
                       value="{{ old('tanggal_lahir') }}"
                       required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                        id="jenis_kelamin"
                        class="form-control"
                        required>

                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki"
                        {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>
                    <option value="Perempuan"
                        {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>

                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat"
                          id="alamat"
                          class="form-control"
                          rows="3"
                          placeholder="Masukkan alamat"
                          required>{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text"
                       name="nomor_telepon"
                       id="nomor_telepon"
                       class="form-control"
                       placeholder="Masukkan nomor telepon"
                       value="{{ old('nomor_telepon') }}"
                       required>
            </div>

            <div class="mt-4">

                <button type="reset" class="btn btn-secondary">
                    <i class="fas fa-redo"></i> Reset
                </button>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>

                <a href="{{ route('admin.pasien.index') }}"
                   class="btn btn-danger">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

            </div>

        </form>

    </div>
</div>

@endsection