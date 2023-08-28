<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_author',
        'post_title',
        'post_tags',
        'post_excert',
        'post_header',
        'post_header',
        'post',
        'post_status'
    ];
}
