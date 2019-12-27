<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $guarded=['id'];
    
    public static function search($searchTerm)
    {
        return Manager::where('first_name','LIKE', "%{$searchTerm}%")
                        ->orderBy('first_name')
                        // ->paginate(5);
                        ->get();
    }
}
