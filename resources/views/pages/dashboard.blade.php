@extends('layouts.app')

@section('title', 'Dashboard - Medikars')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Cards -->
<div class="row">

    <!-- Total Pasien -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pasien
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $totalPasien }}
                        </div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-user-injured fa-2x text-gray-300"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Total Dokter -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Dokter
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $totalDokter }}
                        </div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Total Pendaftaran -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Pendaftaran
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $totalPendaftaran }}
                        </div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Pendaftaran Hari Ini -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pendaftaran Hari Ini
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $pendaftaranHariIni }}
                        </div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- Grafik Pendaftaran 4 Bulan Terakhir -->
<div class="row">

    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Pendaftaran 4 Bulan Terakhir
                </h6>
            </div>

            <div class="card-body">
                <div class="chart-area">
                    <canvas id="pendaftaranChart"></canvas>
                </div>
            </div>

        </div>
    </div>

</div>


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const bulan = @json(collect($pendaftaranBulanan)->pluck('bulan'));
    const jumlah = @json(collect($pendaftaranBulanan)->pluck('jumlah'));

    const ctx = document.getElementById('pendaftaranChart');

    new Chart(ctx, {
        type: 'line',

        data: {
            labels: bulan,

            datasets: [{
                label: 'Jumlah Pendaftaran',
                data: jumlah,
                borderWidth: 2,
                tension: 0.3,
                fill: false
            }]
        },

        options: {
            maintainAspectRatio: false,

            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
@endpush

<!-- Pendaftaran Terbaru -->
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Pendaftaran Terbaru
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
                    </tr>
                </thead>

                <tbody>

                    @forelse($pendaftaranTerbaru as $pendaftaran)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pendaftaran->pasien->nama }}</td>
                            <td>{{ $pendaftaran->dokter->nama }}</td>
                            <td>{{ $pendaftaran->tanggal_pendaftaran }}</td>
                            <td>{{ $pendaftaran->keluhan }}</td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center">
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