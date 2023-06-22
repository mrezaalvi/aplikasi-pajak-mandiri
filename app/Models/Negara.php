<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Negara extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['kode', 'nama', 'p3b'];

    protected $casts = [
        'p3b' => 'boolean',
    ];
}
