<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $guarded=['id'];
    
    public static function search($searchTerm)
    {
        return Shop::where('title','LIKE', "%{$searchTerm}%")
                        ->orderBy('title')
                        // ->paginate(5);
                        ->get();
    }

    
}
