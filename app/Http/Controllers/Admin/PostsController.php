<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    public function addPost() {
        $category = Category::get();
        return view('admin.posts.add_post', compact('category'));
    }

    public function postAddPost() {
        request()->validate([
            'title'         => 'required|min:3|max:95|unique:posts,title',
            'description'   => 'required',
            'category'      => 'required',
            'image'         => 'required|file|image|max:1999|mimes:png,jpg,jpeg',
            'tags'          => ['required', 'regex:/^[a-zA-Z0-9-_., ]*$/', 'min:3', 'max:32', 'string']
        ]);

        if(\App\Tag::inserTag(request('tags'))) {
            if (request()->hasFile('image')) {
                $file_with_ext = request()->file('image')->getClientOriginalName();
                $file_ext = request()->file('image')->getClientOriginalExtension();
                $file_name_new = rand(4444, 1111) . time() . '.' . $file_ext;
                $file_path = request()->file('image')->storeAs('/images/posts/', $file_name_new);
            }


            $post = Post::create([
                'user_id' => auth()->user()->id,
                'cat_id' => request('category'),
                'title' => request('title'),
                'description' => request('description'),
                'path_image' => $file_path
            ]);
            if(is_array(\Session::get('tags'))) {
                foreach (\Session::get('tags') as $tag) {
                    $post->tags()->attach($tag);
                }
            } else {
                $post->tags()->attach(\Session::get('tags'));
            }
            \Session::forget('tags');
            return redirect()->back()->with('success', trans('admin.add_success'));
        }
    }

    public function editPost($id) {

        $category = Category::get();
        $post     = Post::where('id', $id)->first();
        if(!empty($post)) {
            return view('admin.posts.edit_post', compact('category', 'post'));
        } else {
            return 'Not Found';
        }
    }

    public function updatePost($id) {
        $post = Post::where('id', $id)->first();
        request()->validate([
            'title'         => 'required|min:3|max:95|unique:posts,title,'.$post->id,
            'description'   => 'required',
            'category'      => 'required',
            'image'         => 'file|image|max:1999|mimes:png,jpg,jpeg'
        ]);

        if(\App\Tag::inserTag(request('tags'))) {
            if (request()->hasFile('image')) {
                File::delete(public_path('upload/' . $post->path_image));
                $file_with_ext = request()->file('image')->getClientOriginalName();
                $file_ext = request()->file('image')->getClientOriginalExtension();
                $file_name_new = rand(4444, 1111) . time() . '.' . $file_ext;
                $file_path = request()->file('image')->storeAs('/images/posts/', $file_name_new);
            }


            $post->update([
                'cat_id' => request('category'),
                'title' => request('title'),
                'description' => request('description'),
                'path_image' => $file_path ?? $post->path_image
            ]);
            $post = Post::whereTitle(request('title'))->first();
            if (is_array(\Session::get('tags'))) {
                for ($i = 0; $i < count(\Session::get('tags')); $i++) {
                    if ($i === 0) {
                        $post->tags()->sync(\Session::get('tags')[$i]);
                        continue;
                    }
                    $post->tags()->sync(\Session::get('tags')[$i], false);

                }
            } else {
                $post->tags()->sync(\Session::get('tags'));
            }
            return redirect()->back()->with('success', trans('admin.update_success'));
        }
    }

    public function viewPosts() {
        $posts = Post::all();
        return view('admin.posts.view_posts', compact('posts'));
    }

    public function deletePost($id) {
        $post = Post::where('id', $id)->first();
        if(!empty($post)) {
            File::delete(public_path('upload/' . $post->path_image));
            $post->delete();
            return redirect()->route('viewPosts')->with('success', trans('admin.delete_success'));
        } else {
            return 'Not Found';
        }
    }


}
