<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introduction extends Model
{
    use HasFactory;
    protected $fillable = [
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'text1',
        'text2',
        'text3',
        'text4',
        'text5'
    ];
}
