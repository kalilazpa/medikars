@extends('layouts.app')

@section('title', 'Edit Pendaftaran - Medikars')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Pendaftaran</h1>
</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Pendaftaran
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.pendaftaran.update', $pendaftaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="pasien_id">Pasien</label>

                <select name="pasien_id" id="pasien_id" class="form-control" required>
                    <option value="">-- Pilih Pasien --</option>

                    @foreach($pasiens as $pasien)
                        <option value="{{ $pasien->id }}"
                            {{ $pendaftaran->pasien_id == $pasien->id ? 'selected' : '' }}>
                            {{ $pasien->nama }} - {{ $pasien->nik }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="dokter_id">Dokter</label>

                <select name="dokter_id" id="dokter_id" class="form-control" required>
                    <option value="">-- Pilih Dokter --</option>

                    @foreach($dokters as $dokter)
                        <option value="{{ $dokter->id }}"
                            {{ $pendaftaran->dokter_id == $dokter->id ? 'selected' : '' }}>
                            {{ $dokter->nama }}
                            @if($dokter->spesialisasi)
                                - {{ $dokter->spesialisasi }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_pendaftaran">Tanggal Pendaftaran</label>

                <input type="date"
                       name="tanggal_pendaftaran"
                       id="tanggal_pendaftaran"
                       class="form-control"
                       value="{{ $pendaftaran->tanggal_pendaftaran }}"
                       required>
            </div>

            <div class="form-group">
                <label for="keluhan">Keluhan</label>

                <textarea name="keluhan"
                          id="keluhan"
                          class="form-control"
                          rows="4"
                          required>{{ $pendaftaran->keluhan }}</textarea>
            </div>

            <div class="mt-4">

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>

                <a href="{{ route('admin.pendaftaran.index') }}"
                   class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

            </div>

        </form>

    </div>
</div>

@endsection