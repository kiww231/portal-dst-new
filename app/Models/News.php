<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'title',
        'news_short',
        'news',
        'date',
        'thumbnail',
        'image',
        'is_active',
        'slug',
        'banner',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }
}
