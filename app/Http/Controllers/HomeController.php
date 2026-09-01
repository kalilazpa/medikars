<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Pendaftaran;

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

        $pendaftarans = Pendaftaran::with(['pasien', 'dokter'])
            ->latest()
            ->take(5)
            ->get();

        return view('pages.dashboard', compact(
            'totalPasien',
            'totalDokter',
            'totalPendaftaran',
            'pendaftarans'
        ));
    }
}