<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Kunjungan;
use App\Models\Pasien;
use Illuminate\Http\Request;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kunjungans = Kunjungan::with(['pasien', 'dokter'])->orderBy('tanggal', 'DESC')->paginate(10);
        return view('kunjungan.index', compact('kunjungans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        return view('kunjungan.create', compact(['pasiens', 'dokters']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosis' => 'required|max:255|string',
            'biaya' => 'required|decimal:2',
            'status' => 'required|max:255|string',
        ]);

        Kunjungan::create($data);

        return redirect()->route('kunjungan.index')->with('ok', 'Data kunjungan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        return view('kunjungan.edit', compact(['kunjungan', 'pasiens', 'dokters']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kunjungan $kunjungan)
    {
        $data = $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
            'diagnosis' => 'required|max:255|string',
            'biaya' => 'required|decimal:2',
            'status' => 'required|max:255|string',
        ]);

        $kunjungan->update($data);

        return redirect()->route('kunjungan.index')->with('ok', 'Data kunjungan diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kunjungan $kunjungan)
    {
        $kunjungan->delete();

        return redirect()->route('kunjungan.index')->with('ok', 'Data kunjungan dihapus.');
    }
}
