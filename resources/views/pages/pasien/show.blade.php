@extends('layouts.app')

@section('title', 'Detail Pasien - Medikars')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Pasien</h1>

    <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Informasi Pasien
        </h6>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="30%">Nama Lengkap</th>
                <td>{{ $pasien->nama }}</td>
            </tr>

            <tr>
                <th>NIK</th>
                <td>{{ $pasien->nik }}</td>
            </tr>

            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $pasien->tanggal_lahir }}</td>
            </tr>

            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $pasien->jenis_kelamin }}</td>
            </tr>

            <tr>
                <th>Alamat</th>
                <td>{{ $pasien->alamat }}</td>
            </tr>

            <tr>
                <th>Nomor Telepon</th>
                <td>{{ $pasien->nomor_telepon }}</td>
            </tr>

        </table>

        <div class="mt-3">
            <a href="{{ route('admin.pasien.edit', $pasien->id) }}"
               class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>

    </div>
</div>

@endsection