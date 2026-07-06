<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pasien;

class KunjunganController extends Controller
{
    public function index(int $pasienId)
    {
        try {
            $pasien = Pasien::with('kunjungans')->findOrFail($pasienId);
            return response()->json($pasien->kunjungans);
        } catch (\Throwable $th) {
            $statusCode = 404;
            return response()->json([
                'success' => false,
                'statusCode' => $statusCode,
                'message' => "Pasien tidak dapat ditemukan"
            ], $statusCode);
        }
    }
}
