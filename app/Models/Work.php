<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'postDateTime',
        'title',
        'img',
        'tags',
        'item_type',
        'type',
        'language',
        'overview',
        'metaTitle',
        'metaDescription',
        'introduction_id',
    ];

    public function introduction()
    {
        return $this->belongsTo(Introduction::class);
    }
}
