@extends('layouts.app')

@section('title', 'Edit Pasien - Medikars')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Pasien</h1>
</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Data Pasien
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text"
                       name="nama"
                       class="form-control"
                       value="{{ $pasien->nama }}"
                       required>
            </div>

            <div class="form-group">
                <label>NIK</label>
                <input type="text"
                       name="nik"
                       class="form-control"
                       value="{{ $pasien->nik }}"
                       required>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date"
                       name="tanggal_lahir"
                       class="form-control"
                       value="{{ $pasien->tanggal_lahir }}"
                       required>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>

                <select name="jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>

                    <option value="Laki-laki"
                        {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>

                    <option value="Perempuan"
                        {{ $pasien->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Alamat</label>

                <textarea name="alamat"
                          class="form-control"
                          rows="3"
                          required>{{ $pasien->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>

                <input type="text"
                       name="nomor_telepon"
                       class="form-control"
                       value="{{ $pasien->nomor_telepon }}"
                       required>
            </div>

            <div class="mt-4">

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.pasien.index') }}"
                   class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>

            </div>

        </form>

    </div>
</div>

@endsection