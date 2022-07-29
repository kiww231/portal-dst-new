<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contact";
    protected $primaryKey = 'id';
    protected $fillable = [
        'address',
        'email',
        'phone',
        'maps_url',
        'banner',
        'youtube',
        'twitter',
        'instagram',
        'facebook',
    ];
}
