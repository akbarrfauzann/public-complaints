<?php

namespace App\Models;

use App\Models\Tanggapan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';
    protected $primaryKey = 'id_pengaduan';
    protected $fillable = [
        'id_pengaduan',
        'tgl_pengaduan',
        'nik',
        'nama',
        'isi_laporan',
        'foto',
        'status'
    ];

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan');
    }
}
