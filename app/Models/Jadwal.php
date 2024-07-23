<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = [
        'materi_id',
        'dates',
        'start_time',
        'end_time',
    ];
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
