<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
