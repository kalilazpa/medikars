@extends('layouts.app')

@section('title', 'Data Pendaftaran - Medikars')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pendaftaran</h1>

    <a href="{{ route('admin.pendaftaran.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Pendaftaran
    </a>
</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Daftar Pendaftaran
        </h6>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pasien</th>
                        <th>Dokter</th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Keluhan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pendaftarans as $pendaftaran)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $pendaftaran->pasien->nama }}
                            </td>

                            <td>
                                {{ $pendaftaran->dokter->nama }}
                            </td>

                            <td>
                                {{ $pendaftaran->tanggal_pendaftaran }}
                            </td>

                            <td>
                                {{ $pendaftaran->keluhan }}
                            </td>

                            <td>

                                <a href="{{ route('admin.pendaftaran.show', $pendaftaran->id) }}"
                                   class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('admin.pendaftaran.edit', $pendaftaran->id) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.pendaftaran.destroy', $pendaftaran->id) }}"
                                      method="POST"
                                      style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data pendaftaran ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                Belum ada data pendaftaran.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
</div>

@endsection