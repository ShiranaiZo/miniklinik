<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{
    protected $table = 'pasien';

    protected $fillable = [
        'no_rm',
        'nama',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
    ];

    public function kunjungans(): HasMany
    {
        return $this->hasMany(Kunjungan::class, 'pasien_id');
    }
}
