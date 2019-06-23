<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Tag extends Model
{

    protected $fillable = ['name'];

    private static $delimeters = [' ',','];

    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);

    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function delimeters($request) {
        foreach (self::$delimeters as $delimeter) {
            if (strpos($request, $delimeter)) {
                $delimeters[] = $delimeter;

            }

        }
        return $delimeters ?? null;
    }

    public static function inserTag($new) {
        $tags = new self();
        if(self::delimeters($new) !== null) {
            $inserted_tags = preg_split('/(,| )/', $new);
            $counter = 0;
            foreach ($inserted_tags as $tag) {
                if($tags->whereName(str_slug($tag))->exists()) {
                    $user_tags[] = Tag::whereName($tag)->get();
                    continue;
                }
                $tags->create(['name' => str_slug($tag), 'user_id'=> auth()->user()->id]);
                $user_tags[] = Tag::whereName($tag)->get();
                ++$counter;
            }
        } else {
            if(!$tags->where('name', str_slug($new))->exists()) {
                $tags->create(['name' => str_slug($new), 'user_id' => auth()->user()->id]);
            }
            $user_tags = $tags->where('name', str_slug($new))->first();
        }
        Session::put('tags', $user_tags);

        return true;
    }


}
