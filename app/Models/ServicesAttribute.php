<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesAttribute extends Model
{
    protected $table = "services_attribute";
    protected $primaryKey = 'id';
    protected $fillable = [
        'banner',
        'video_title',
        'video_thumbnail',
        'video_url',
        'video_is_active',
        'help_title',
        'help_image',
        'help_is_active',
        'business_tagline',
        'business_title',
        'business_desc',
        'business_is_active',
        'benefits_title',
        'benefits_desc',
        'benefits_image',
        'benefits_is_active',
        'faq_is_active',
    ];
}
