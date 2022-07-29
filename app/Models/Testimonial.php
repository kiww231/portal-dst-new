<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = "testimonial";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'testimoni',
        'is_active',
    ];
}
