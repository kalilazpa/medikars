@extends('layouts.app')

@section('title', 'Tambah Pendaftaran - Medikars')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Pendaftaran</h1>
</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Pendaftaran
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.pendaftaran.store') }}" method="POST">

            @csrf

            <!-- Pasien -->
            <div class="form-group">
                <label for="pasien_id">Pasien</label>

                <select name="pasien_id"
                        id="pasien_id"
                        class="form-control"
                        required>

                    <option value="">-- Pilih Pasien --</option>

                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->id }}">
                            {{ $pasien->nama }} - {{ $pasien->nik }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Dokter -->
            <div class="form-group">
                <label for="dokter_id">Dokter</label>

                <select name="dokter_id"
                        id="dokter_id"
                        class="form-control"
                        required>

                    <option value="">-- Pilih Dokter --</option>

                    @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}">
                            {{ $dokter->nama }} - {{ $dokter->spesialisasi }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Tanggal Pendaftaran -->
            <div class="form-group">
                <label for="tanggal_pendaftaran">
                    Tanggal Pendaftaran
                </label>

                <input type="date"
                       name="tanggal_pendaftaran"
                       id="tanggal_pendaftaran"
                       class="form-control"
                       required>
            </div>

            <!-- Keluhan -->
            <div class="form-group">
                <label for="keluhan">Keluhan</label>

                <textarea name="keluhan"
                          id="keluhan"
                          class="form-control"
                          rows="4"
                          placeholder="Masukkan keluhan pasien"
                          required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>

            <a href="{{ route('admin.pendaftaran.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection