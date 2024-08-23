<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petugas extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;

    protected $guard = 'admin';
    protected $table = 'petugas';
    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level'
    ];
}
