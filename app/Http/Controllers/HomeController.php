<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Pendaftaran;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display the dashboard.
     */
    public function index()
    {
        $totalPasien = Pasien::count();
        $totalDokter = Dokter::count();
        $totalPendaftaran = Pendaftaran::count();

        $pendaftaranHariIni = Pendaftaran::whereDate(
            'tanggal_pendaftaran',
            today()
        )->count();

        // Data pendaftaran 4 bulan terakhir
        $pendaftaranBulanan = [];

        for ($i = 3; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i);

            $jumlah = Pendaftaran::whereYear(
                'tanggal_pendaftaran',
                $bulan->year
            )
            ->whereMonth(
                'tanggal_pendaftaran',
                $bulan->month
            )
            ->count();

            $pendaftaranBulanan[] = [
                'bulan' => $bulan->translatedFormat('F'),
                'jumlah' => $jumlah,
            ];
        }

        $pendaftaranTerbaru = Pendaftaran::with(['pasien', 'dokter'])
            ->latest()
            ->take(5)
            ->get();

        return view('pages.dashboard', compact(
            'totalPasien',
            'totalDokter',
            'totalPendaftaran',
            'pendaftaranHariIni',
            'pendaftaranBulanan',
            'pendaftaranTerbaru'
        ));
    }
}