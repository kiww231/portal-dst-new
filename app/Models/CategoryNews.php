<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    protected $table = "category_news";
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
    ];
}
