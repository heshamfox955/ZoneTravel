<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = 'categories';

    protected $fillable = [
        'user_id',
        'name',
    ];

    public function user_id() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function blog_posts()
    {
        return $this->hasMany('App\Post', 'cat_id');
    }

}
