<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\Post;
class TagsController extends Controller
{
    public function index(Tag $tag) {
        $posts = $tag->posts;
        $tags = Tag::get();
        $s = Request()->input('s');
        $pos = Post::orderBy('id', 'ASC')->limit(5)->get();
        $category = category::with('blog_posts')->get();
        $poste = Post::latest()->search($s)->paginate(8);
        return view('tags.index', compact('posts', 'pos', 'category', 'tags', 'poste'));
    }
}
