<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'postDateTime',
        'title',
        'tags',
        'img',
        'detail',
        'metaTitle',
        'metaDescription',
    ];
}
