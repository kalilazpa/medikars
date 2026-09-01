<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::with(['pasien', 'dokter'])->get();

        return view('pages.pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        return view('pages.pendaftaran.create', compact('pasiens', 'dokters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_pendaftaran' => 'required|date',
            'keluhan' => 'required|string',
        ]);

        Pendaftaran::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
            'keluhan' => $request->keluhan,
        ]);

        return redirect()
            ->route('admin.pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendaftaran = Pendaftaran::with(['pasien', 'dokter'])
            ->findOrFail(decrypt($id));

        return view('pages.pendaftaran.show', compact('pendaftaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail(decrypt($id));

        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        return view(
            'pages.pendaftaran.edit',
            compact('pendaftaran', 'pasiens', 'dokters')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail(decrypt($id));

        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:dokters,id',
            'tanggal_pendaftaran' => 'required|date',
            'keluhan' => 'required|string',
        ]);

        $pendaftaran->update([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
            'keluhan' => $request->keluhan,
        ]);

        return redirect()
            ->route('admin.pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail(decrypt($id));

        $pendaftaran->delete();

        return redirect()
            ->route('admin.pendaftaran.index')
            ->with('success', 'Pendaftaran berhasil dihapus.');
    }
}