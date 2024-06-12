<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationSetting extends Model
{
    use HasFactory;


    protected $fillable = [
        'tournament_id',
        'jenis',
        // 'jumlah_peserta',
        'jumlah_anggota_tim',
        'batas_pendaftaran',
        'slot_tersisa',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
}
