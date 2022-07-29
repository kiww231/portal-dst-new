<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsAttribute extends Model
{
    protected $table = "news_attribute";
    protected $primaryKey = 'id';
    protected $fillable = [
        'banner',
    ];
}
