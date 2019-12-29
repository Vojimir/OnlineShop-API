<?php

namespace App;

use App\Article;
use App\Manager;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded = ['id'];

    public static function search($searchTerm)
    {
        return Shop::where('title', 'LIKE', "%{$searchTerm}%")
            ->orderBy('title')
            ->paginate(10)
            ->get();
    }
    public function manager()
    {

        return $this->belongsTo(Manager::class);
    }
    public function articles()
    {

        return $this->hasMany(Article::class);
    }
    public function comments()
    {

        return $this->hasMany(Comment::class);
    }
}
