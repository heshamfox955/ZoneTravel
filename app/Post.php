<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';

    protected $fillable = [
        'cat_id',
        'user_id',
        'title',
        'description',
        'path_image'
    ];
    public function user_id() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function cat_id() {
        return $this->hasOne('App\Category', 'id', 'cat_id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeSearch($query, $s) {
        return $query->where('title', 'like', '%'.$s.'%')->orWhere('description', 'like', '%'.$s.'%');
    }

    public function blog_categories()
    {
        return $this->belongsTo('App\Category', 'cat_id');
    }

}
