<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = "projects";
    protected $primaryKey = 'id';
    protected $fillable = [
        'banner',
        'title',
        'description',
        'client',
        'category',
        'date',
        'thumbnail',
        'image',
        'slug',
        'is_active',
    ];
}
