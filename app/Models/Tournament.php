<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
     protected $table = 'tournaments';
    protected $fillable = [
        'user_id',
        'game_id',
        'nama',
        'url',
        'jadwal_mulai',
        'jadwal_selesai',
        'deskripsi',
        'tipe',
        'alamat',
        'hadiah',
        'rules',
        'fee',
        'url_live',
        'format'
    ];
    
    //Contoh relasi dengan User, jika ada
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registrationSetting()
    {
        return $this->hasOne(RegistrationSetting::class);
    }

    // app/Models/Tournament.php
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function standings()
    {
        return $this->hasMany(Standing::class);
    }
    
    public function teams()
    {
        return $this->hasMany(Team::class);
    }

}
