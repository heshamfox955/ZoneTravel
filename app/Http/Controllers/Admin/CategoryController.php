<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory() {
        return view('admin.category.add_category');
    }

    public function postAddCategory() {
        request()->validate([
            'name' => 'required|min:3|max:32|unique:categories,name'
        ]);
        Category::create([
            'user_id'     => auth()->user()->id,
            'name'        => request('name'),
        ]);
        return redirect()->back()->with('success', trans('admin.add_success'));
    }

    public function editCategory($id) {
        if(auth()->user()->permissions == 'admin') {
            $cat = Category::where('id', $id)->first();
            if (!empty($cat)) {
                return view('admin.category.edit_category', compact('cat'));
            } else {
                return 'Not Found';
            }
        } elseif (auth()->user()->permissions == 'modertor') {
            $cat = Category::where('id', $id)->first();
            if (!empty($cat)) {
                if ($cat->user_id == auth()->user()->id) {
                    return view('admin.category.edit_category', compact('cat'));
                } else {
                    return redirect()->back()->with('error', trans('admin.insufficient_permissions'));
                }
            } else {
                return 'Not Found';
            }
        } else {
            return redirect()->back()->with('error', trans('admin.insufficient_permissions'));
        }
    }

    public function updateCategory($id) {
        $cat = Category::where('id',$id)->first();
        request()->validate([
            'name' => 'required|min:3|max:32|unique:categories,name'
        ]);
        $cat->update([
            'name' => request('name')
        ]);
        return redirect()->back()->with('success', trans('admin.update_success'));
    }

    public function viewCategory() {
        $category = Category::get();
        return view('admin.category.view_category', compact('category'));
    }

    public function deleteCategory($id) {
        if(auth()->user()->permissions == 'admin') {

            $cat = Category::where('id', $id)->first();
            if (!empty($cat)) {
                $cat->delete();
                return redirect()->route('viewCategory')->with('success', trans('admin.delete_success'));
            } else {
                return 'Not Found';
            }

        } elseif (auth()->user()->permissions == 'modertor') {
            $cat = Category::where('id', $id)->first();
            if (!empty($cat)) {
                if ($cat->user_id == auth()->user()->id) {
                    $cat->delete();
                    return redirect()->route('viewCategory')->with('success', trans('admin.delete_success'));
                } else {
                    return redirect()->back()->with('error', trans('admin.insufficient_permissions'));
                }
            } else {
                return 'Not Found';
            }

        } else {
            return redirect()->back()->with('error', trans('admin.insufficient_permissions'));
        }
    }



}
