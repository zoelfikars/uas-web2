<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'faktur',
        'peserta_id',
        'kursus_id',
        'harga',
        'catatan',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'peserta_id');
    }
    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }
}
