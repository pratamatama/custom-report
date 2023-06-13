<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensusRawatInap extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tgl_mrs',
        'nama',
        'gender',
        'age',
        'no_rm',
        'cara_datang',
        'alamat',
        'diagnosa',
        'diagnosa_krs',
        'diagnosa_tgl_krs',
        'hp',
        'krs',
        'aps',
        'm',
        'rjk',
        'pdh',
        'cara_bayar',
        'dpjp',
    ];
}
