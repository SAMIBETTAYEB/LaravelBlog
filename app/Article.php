<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    protected $table='articles';
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

}
