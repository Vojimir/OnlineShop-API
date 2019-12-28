<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;

class Article extends Model
{
    protected $guarded = ['id'];
    
    public function shop() {
        return $this->belongsTo(Shop::class);
    }
}
