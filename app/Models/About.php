<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = "about";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tagline',
        'title',
        'description',
        'image',
        'image_small',
        'banner',
        'video_title',
        'video_thumbnail',
        'video_url',
        'video_is_active',
        'brand_is_active',
        'testimonial_is_active',
        'team_is_active',
    ];
}
