<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['author','body', 'shop_id','author_id'];

    public function post()
    {
        return $this->belongsTo(Shop::class);
    }
}
