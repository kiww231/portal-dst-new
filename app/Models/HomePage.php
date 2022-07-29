<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = "home_page";
    protected $primaryKey = 'id';
    protected $fillable = [
        'brand_is_active',
        'feature_is_active',
        'about_is_active',
        'services_is_active',
        'trusted_is_active',
        'trusted_title',
        'trusted_image',
        'trusted_count',
        'project_is_active',
        'improve_is_active',
        'improve_project_complete',
        'improve_tagline',
        'improve_title',
        'improve_image',
        'improve_background',
        'testimonial_is_active',
        'news_is_active',
        'cta_is_active',
        'cta_sub_title',
        'cta_title',
        'cta_url',
        'cta_background',
    ];
}
