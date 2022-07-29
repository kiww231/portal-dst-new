<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $table = "recruitment";
    protected $primaryKey = 'id';
    protected $fillable = [
        'career_id',
        'name',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'phone',
        'email',
        'address',
        'application_letter',
        'cv',
        'attachment1',
        'attachment2',
        'date',
    ];
}
