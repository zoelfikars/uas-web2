<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kursus_id',
        'judul',
        'deskripsi',
    ];

    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }
    public function jadwal()
    {
        return $this->hasOne(Jadwal::class);
    }
}
