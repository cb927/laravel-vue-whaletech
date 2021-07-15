<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    use HasFactory;
    protected $fillable = [
        'title1',
        'title2',
        'title3',
        'title4',
        'title5',
        'text1',
        'text2',
        'text3',
        'text4',
        'text5'
    ];
}
