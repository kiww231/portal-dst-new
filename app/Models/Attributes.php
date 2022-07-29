<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $table = "attributes";
    protected $primaryKey = 'id';
    protected $fillable = [
        'copyright',
        'favicon',
        'logo',
        'logo_white',
    ];
}
