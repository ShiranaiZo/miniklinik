<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pasien;

class KunjunganController extends Controller
{
    public function index(int $pasienId)
    {
        $pasien = Pasien::with('kunjungans')->findOrFail($pasienId);
        return response()->json($pasien->kunjungans);
    }
}
