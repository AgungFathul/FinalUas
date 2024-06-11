<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'isiberita', 'photo'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
