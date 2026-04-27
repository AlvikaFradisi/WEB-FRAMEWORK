<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'tempat_lahir',
        'tgl_lahir',
        'email',
        'prodi',
        'alamat'
    ];

    protected $guarded = [];

    use SoftDeletes;
}