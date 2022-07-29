<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerAttribute extends Model
{
    protected $table = "career_attribute";
    protected $primaryKey = 'id';
    protected $fillable = [
        'banner',
    ];
}
