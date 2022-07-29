<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = "career";
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'start_date',
        'end_date',
        'slug',
        'thumbnail',
        'image',
        'banner',
        'is_active',
    ];
}
