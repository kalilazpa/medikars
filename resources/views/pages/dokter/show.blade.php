extends('layouts.app')

@section('title', 'Detail Dokter - Medikars')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Dokter</h1>
    </div>

    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Detail Data Dokter</h5>
        </div>

        <div class="card-body">

            <div class="form-group">
                <label>Nama Dokter</label>
                <input type="text"
                       class="form-control"
                       value="{{ $dokter->nama }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Spesialisasi</label>
                <input type="text"
                       class="form-control"
                       value="{{ $dokter->spesialisasi }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text"
                       class="form-control"
                       value="{{ $dokter->nomor_telepon }}"
                       readonly>
            </div>