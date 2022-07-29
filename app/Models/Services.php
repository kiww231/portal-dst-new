<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = "services";
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image',
        'icon',
        'is_active',
        'is_help',
        'is_feature',
        'is_improve',
        'banner',
        'slug',
    ];
}
