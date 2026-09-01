<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pages.pasien.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:pasiens,nik',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        Pasien::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        return redirect()
        ->route('admin.pasien.index')
        ->with('success', 'Data pasien berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pasien = Pasien::findOrFail(decrypt($id));

        return view('pages.pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $pasien = Pasien::findOrFail(decrypt($id));

        return view('pages.pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $pasien = Pasien::findOrFail(decrypt($id));

        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:pasiens,nik,' . $pasien->id,
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string|max:20',
        ]);

        $pasien->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
        ]);

        return redirect()
            ->route('admin.pasien.index')
            ->with('success', 'Data pasien berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail(decrypt($id));

        $pasien->delete();

        return redirect()
            ->route('admin.pasien.index')
            ->with('success', 'Data pasien berhasil dihapus.');
    }
}
