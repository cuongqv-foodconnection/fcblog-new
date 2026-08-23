<?php

namespace App\Features\Post\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\PostFactory;

class Post extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return PostFactory::new();
    }

    protected $table = 'posts';
    protected $fillable = ['title'];
}
