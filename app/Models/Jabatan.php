<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama_jabatan',
    ];

    protected function namaJabatan(): Attribute{
        return Attribute::make(
            get: fn($value)=>Str::upper($value),
            set: fn($value)=>Str::lower($value),
        );
    }
}
