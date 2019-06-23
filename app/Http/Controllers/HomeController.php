<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Post;
use App\Tag;
use App\Hotel;
use Mail;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::orderBy('id', 'desc')->limit(3)->get();
        return view('home', compact('posts'));
    }

    public function blog() {
        $tags = Tag::get();
        $s = Request()->input('s');
        $posts = Post::latest()->search($s)->paginate(8);
        $pos = Post::orderBy('id', 'ASC')->limit(5)->get();
        $category = category::with('blog_posts')->get();
        return view('blog', compact('posts', 's', 'pos' ,'category', 'tags'));
    }

    public function viewPost($id) {
        $pos = Post::orderBy('id', 'ASC')->limit(5)->get();
        $category = category::with('blog_posts')->get();
        $post = Post::where('id', $id)->first();
        $tags = Tag::limit(10)->get();
        return view('post', compact('post', 'pos', 'category', 'tags'));
    }

    public function category(Category $id) {
        $categories = $id->blog_posts;
        $tags = Tag::get();
        $s = Request()->input('s');
        $posts = Post::latest()->search($s)->paginate(8);
        $pos = Post::orderBy('id', 'ASC')->limit(5)->get();
        $category = category::with('blog_posts')->get();
        return view('category',compact('posts', 'categories','pos', 'category', 'tags'));
    }

    public function postContact() {
        request()->validate([
            'name'  => 'required',
            'email'  => 'email|required',
            'phone'  => 'required',
            'message'  => 'required',
        ]);
        Mail::send('emails.contact-message', [
            'msg'  => request()->message,
            'phone'=> request()->phone
        ], function ($mail) {
            $mail->from(request()->email, request()->name, request()->phone);
            $mail->to('heshamfox955@gmail.com')->subject('Contact Message');
            $mail->to('starkhm99@gmail.com')->subject('Contact Message');
        });
        return redirect()->back()->with('flash_message', 'Thank You for Your Message');
    }

    public function hotels() {
        $hotels = Hotel::latest()->paginate(12);
        return view('hotels.view_hotel', compact('hotels'));
    }

    public function viewHotel($id) {
        $hotel = Hotel::where('id', $id)->first();
        return view('hotels.hotel', compact('hotel'));
    }

}
