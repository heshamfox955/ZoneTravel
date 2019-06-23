<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    public function index() {
        $users = User::get();
        $cat = Category::get();
        $post = Post::get();
        $tags = Tag::get();
        $last_post = Post::orderBy('id', 'Desc')->first();
        $last_posts = Post::orderBy('id', 'Desc')->limit(8)->get();
        $last_user = User::orderBy('id', 'Desc')->limit(8)->get();
        return view('admin.home', compact('users', 'cat', 'post', 'tags', 'last_post', 'last_posts', 'last_user'));
    }

    public function addUser() {
        if(auth()->user()->permissions == 'admin'){
            return view('admin.admins.add_user');
        } else {
            return redirect()->back()->with('error', trans('admin.insufficient_permissions'));
        }
    }

    public function postAddUser() {
        if(auth()->user()->permissions == 'admin'){
            request()->validate([
                'email'     => [
                    'required',
                    'email',
                    'unique:users,email',
                    'regex:/(.*)@(gmail|yahoo|hotmail)\.com/i'
                ],
                'username'      => 'required|min:3|max:32|alpha_dash|unique:users,username',
                'first_name'    => 'required|min:3|max:18|alpha',
                'last_name'     => 'required|min:3|max:18|alpha',
                'permissions'   => 'required',
                'password'      => 'required|string|min:8|max:32|confirmed',
                'image'         => 'nullable|file|image|max:1999|mimes:png,jpg,jpeg',
                'location'      => 'required|string|min:3|max:32',
                'date'          => 'required|date|before_or_equal:2001-01-01|date_format:Y-m-d'
            ]);

            if(request()->hasFile('image')) {
                $file_with_ext = request()->file('image')->getClientOriginalName();
                $file_ext = request()->file('image')->getClientOriginalExtension();
                $file_name_new = rand(4444,1111).time().'.'.$file_ext;
                $file_path = request()->file('image')->storeAs('/images/users/',$file_name_new);
            }

            User::create([
                'email'        => request('email'),
                'username'     => request('username'),
                'first_name'   => request('first_name'),
                'last_name'    => request('last_name'),
                'permissions'  => request('permissions'),
                'password'     => bcrypt(request('password')),
                'status'       => 1,
                'path_image'   => $file_path ?? '',
                'location'     => request('location'),
                'about'        => request('about'),
                'dob'          => request('date'),
            ]);

            return redirect()->back()->with('success', trans('admin.add_success'));

        } else {
            return redirect()->back()->with('error', trans('admin.insufficient_permissions'));
        }
    }

    public function viewUser() {
        if (auth()->user()->permissions == 'admin') {
            $users = User::all();
            return view('admin.admins.view_users', compact('users'));
        } else {
            return redirect()->back()->with('error', trans('admin.insufficient_permissions'));
        }
    }

    public function viewModertor() {
        $users = User::where('permissions', 'modertor')->get();
        return view('admin.admins.view_users', compact('users'));

    }

    public function viewUsers() {
        $users = User::where('permissions', 'user')->get();
        return view('admin.admins.view_normal_user', compact('users'));

    }

    public function editUser($id) {
        if (auth()->user()->permissions == 'admin') {
            $users = User::where('id', $id)->first();
            if (!empty($users)) {
                return view('admin.admins.edit_user', compact('users'));
            } else {
                return 'not found';
            }
        } else {
            return redirect()->back()->with('error', trans('admin.insufficient_permissions'));
        }
    }

    public function updateUser($id) {
        if (auth()->user()->permissions == 'admin') {
            $user = User::where('id',$id)->first();
            if(!empty($user)) {
                request()->validate([
                    'email' => [
                        'required',
                        'email',
                        'unique:users,email,' . $user->id,
                        'regex:/(.*)@(gmail|yahoo|hotmail)\.com/i'
                    ],
                    'username' => 'required|min:3|max:32|alpha_dash|unique:users,username,' . $user->id,
                    'first_name' => 'required|min:3|max:18|alpha',
                    'last_name' => 'required|min:3|max:18|alpha',
                    'permissions' => 'required',
                    'password' => 'max:32|confirmed',
                    'image' => 'nullable|file|image|max:1999|mimes:png,jpg,jpeg',
                    'location' => 'required|string|min:3|max:32',
                    'date' => 'required|date|before_or_equal:2001-01-01|date_format:Y-m-d'
                ]);

                if (request()->hasFile('image')) {
                    File::delete(public_path('upload/' . $user->path_image));
                    $file_with_ext = request()->file('image')->getClientOriginalName();
                    $file_ext = request()->file('image')->getClientOriginalExtension();
                    $file_name_new = rand(4444, 1111) . time() . '.' . $file_ext;
                    $file_path = request()->file('image')->storeAs('/images/users/', $file_name_new);
                }

                $user->update([
                    'email' => request('email'),
                    'username' => request('username'),
                    'first_name' => request('first_name'),
                    'last_name' => request('last_name'),
                    'permissions' => request('permissions'),
                    'password' => bcrypt(request('password')) ?? $user->password,
                    'path_image' => $file_path ?? $user->path_image,
                    'location' => request('location'),
                    'about' => request('about'),
                    'dob' => request('date'),
                ]);
                return redirect()->back()->with('success', trans('admin.update_success'));
            } else {
                return 'not found';
            }
        } else {
            return redirect()->back()->with('error', trans('admin.insufficient_permissions'));
        }
    }

    public function deleteUser($id) {
        if (auth()->user()->permissions == 'admin') {
            $users = User::where('id', $id)->first();
            if (!empty($users)) {
                if (File::isDirectory('upload' . $users->path_image)) {
                    File::delete(public_path('upload/' . $users->path_image));
                    $users->delete();
                    return redirect()->route('viewUser')->with('success', trans('admin.delete_success'));
                } else {
                    $users->delete();
                    return redirect()->route('viewUser')->with('success', trans('admin.delete_success'));
                }
            } else {
                return 'not found';
            }
        }

    }

    public function setting() {
        $users = User::where('id', auth()->user()->id)->first();
        return view('admin.admins.setting', compact('users'));
    }

    public function updateSetting() {
        $user = User::where('id', auth()->user()->id)->first();
        request()->validate([
            'email'     => [
                'required',
                'email',
                'unique:users,email,'.$user->id,
                'regex:/(.*)@(gmail|yahoo|hotmail)\.com/i'
            ],
            'username'      => 'required|min:3|max:32|alpha_dash|unique:users,username,'.$user->id,
            'first_name'    => 'required|min:3|max:18|alpha',
            'last_name'     => 'required|min:3|max:18|alpha',
            'password'      => 'max:32|confirmed',
            'image'         => 'nullable|file|image|max:1999|mimes:png,jpg,jpeg',
            'location'      => 'required|string|min:3|max:32',
            'date'          => 'date|before_or_equal:2001-01-01|date_format:Y-m-d'
        ]);

        if(request()->hasFile('image')) {
            File::delete(public_path('upload/'.$user->path_image));
            $file_with_ext = request()->file('image')->getClientOriginalName();
            $file_ext = request()->file('image')->getClientOriginalExtension();
            $file_name_new = rand(4444,1111).time().'.'.$file_ext;
            $file_path = request()->file('image')->storeAs('/images/users/',$file_name_new);
        }

        $password = !empty(request('password')) ? bcrypt(request('password')) : $user->password;

        $user->update([
            'email'         => request('email'),
            'username'      => request('username'),
            'first_name'    => request('first_name'),
            'last_name'     => request('last_name'),
            'password'      => $password,
            'path_image'    => $file_path ?? $user->path_image,
            'location'      => request('location'),
            'about'         => request('about'),
            'dob'           => request('date') ?? $user->dob,
        ]);
        return redirect()->back()->with('success', trans('admin.update_success'));
    }

    public function profile($id) {
        $user = User::where('id', $id)->first();
        $posts = Post::where('user_id', $user->id)->get();

        if (!empty($user)) {
            return view('admin.admins.profile', compact('user', 'posts'));
        } else {
            return 'not found';
        }


    }

}
