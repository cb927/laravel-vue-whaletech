<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    use HasFactory;
    protected $fillable = [
        'text1',
        'text2',
        'text3',
        'text4',
        'text5',
        'img1-1',
        'img1-2',
        'img1-3',
        'img2-1',
        'img2-2',
        'img2-3',
        'img3-1',
        'img3-2',
        'img3-3',
        'img4-1',
        'img4-2',
        'img4-3',
        'img5-1',
        'img5-2',
        'img5-3'
    ];
}
