<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'kecamatan',
        'tpt01',
        'tpt02',
        'tpt03',
        'tpt04',
        'status'
    ];

    public static $rules = [
        'nik' => 'required|numeric|digits:16|regex:/^[0-9]+$/u',
        'nama' => 'required|string|max:50|alpha',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'kecamatan' => 'required|string',
        'tpt01' => 'required|in:0,1',
        'tpt02' => 'required|in:0,1',
        'tpt03' => 'required|in:0,1',
        'tpt04' => 'required|in:0,1',
        'status' => 'required|in:0,1'
    ];
}
