<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::orderBy('no_rm')->paginate(10);
        return view('pasien.index', compact('pasien'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'no_rm'         => 'required|unique:pasien,no_rm',
            'nama'          => 'required',
            'tgl_lahir'     => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat'        => 'nullable|string',
            'no_hp'         => 'nullable|string|max:20',
        ]);

        Pasien::create($data);

        return redirect()->route('pasien.index')->with('ok', 'Data pasien berhasil ditambahkan.');
    }

    public function show(Pasien $pasien)
    {
        return redirect()->route('pasien.index');
    }

    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $data = $request->validate([
            // BUG SENGAJA: tidak mengecualikan id saat update — seharusnya 'unique:pasien,no_rm,'.$pasien->id
            'no_rm'         => 'required|unique:pasien,no_rm,'.$pasien->id,
            'nama'          => 'required',
            'tgl_lahir'     => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat'        => 'nullable|string',
            'no_hp'         => 'nullable|string|max:20',
        ]);

        $pasien->update($data);

        return redirect()->route('pasien.index')->with('ok', 'Data pasien diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')->with('ok', 'Data pasien dihapus.');
    }
}
