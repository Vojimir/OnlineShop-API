<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;
use App\User;


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
    public function user() {
        return $this->hasOne(User::class);
    }
    public function shop() {
        return $this->hasOne(Shop::class);
    }
}
