<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageLayer extends Model
{
    protected $table = "image_layer";
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active',
    ];
}
