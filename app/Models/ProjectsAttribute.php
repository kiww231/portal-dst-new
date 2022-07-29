<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsAttribute extends Model
{
    protected $table = "projects_attribute";
    protected $primaryKey = 'id';
    protected $fillable = [
        'banner',
    ];
}
