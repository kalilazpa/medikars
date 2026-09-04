@extends('layouts.app')

@section('title', 'Detail Pendaftaran - Medikars')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Pendaftaran</h1>

    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Informasi Pendaftaran
        </h6>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="30%">Pasien</th>
                <td>{{ $pendaftaran->pasien->nama }}</td>
            </tr>

            <tr>
                <th>Dokter</th>
                <td>{{ $pendaftaran->dokter->nama }}</td>
            </tr>

            <tr>
                <th>Tanggal Pendaftaran</th>
                <td>{{ $pendaftaran->tanggal_pendaftaran }}</td>
            </tr>

            <tr>
                <th>Keluhan</th>
                <td>{{ $pendaftaran->keluhan }}</td>
            </tr>

        </table>

        <div class="mt-3">

            <a href="{{ route('admin.pendaftaran.edit', $pendaftaran->id) }}"
               class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>

        </div>

    </div>
</div>

@endsection