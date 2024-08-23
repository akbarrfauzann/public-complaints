<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;
    protected $table = 'tanggapans';
    protected $fillable = ([
        'id_petugas',
        'id_tanggapan',
        'id_pengaduan',
        'tgl_tanggapan',
        'tanggapan'
    ]);

    public function pengaduan()
    {
        return $this->belongsTo(pengaduan::class);
    }
}
