<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'url',
        'alt'
    ];

    protected $table = 'carousel';
}
