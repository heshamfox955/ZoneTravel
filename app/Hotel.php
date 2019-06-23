<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'description',
        'path_image'
    ];

    public function user_id() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
