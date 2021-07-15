<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'postDateTime',
        'title',
        'top',
        'main',
        'metaTitle',
        'metaDescription',
        'flow_id',
        'scene_id',
        'customizable'
    ];

    public function flow()
    {
        return $this->belongsTo(Flow::class);
    }

    public function scene()
    {
        return $this->belongsTo(Scene::class);
    }
}
