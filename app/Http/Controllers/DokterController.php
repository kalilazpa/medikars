<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = Dokter::all();

        return view('pages.dokter.index', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        Dokter::create([
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        return redirect()
            ->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dokter = Dokter::findOrFail(decrypt($id));

        return view('pages.dokter.show', compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokter = Dokter::findOrFail(decrypt($id));

        return view('pages.dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dokter = Dokter::findOrFail(decrypt($id));

        $request->validate([
            'nama' => 'required|string|max:255',
            'spesialisasi' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $dokter->update([
            'nama' => $request->nama,
            'spesialisasi' => $request->spesialisasi,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        return redirect()
            ->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail(decrypt($id));

        $dokter->delete();

        return redirect()
            ->route('admin.dokter.index')
            ->with('success', 'Data dokter berhasil dihapus.');
    }
}