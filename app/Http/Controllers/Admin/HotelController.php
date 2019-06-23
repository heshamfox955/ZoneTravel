<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use Illuminate\Support\Facades\File;
class HotelController extends Controller
{
    public function addHotel() {
        return view('admin.hotels.add_hotel');
    }

    public function postAddHotel() {
        request()->validate([
            'name'          => 'required|min:3|max:95',
            'address'       => 'required',
            'description'   => 'required',
            'image'         => 'required|file|image|max:1999|mimes:png,jpg,jpeg',
        ]);

        if (request()->hasFile('image')) {
            $file_with_ext = request()->file('image')->getClientOriginalName();
            $file_ext = request()->file('image')->getClientOriginalExtension();
            $file_name_new = rand(4444, 1111) . time() . '.' . $file_ext;
            $file_path = request()->file('image')->storeAs('/images/hotels/', $file_name_new);
        }

        Hotel::create([
            'user_id'       => auth()->user()->id,
            'name'          => request('name'),
            'address'       => request('address'),
            'description'   => request('description'),
            'path_image'    => $file_path,
        ]);
        return redirect()->back()->with('success', trans('admin.add_success'));
    }

    public function editHotel($id) {
        $hotel = Hotel::where('id', $id)->first();
        if(!empty($hotel)) {
            return view('admin.hotels.edit_hotel', compact('hotel'));
        } else {
            return 'Not Found';
        }

    }

    public function update($id) {
        $hotel = Hotel::where('id', $id)->first();
        request()->validate([
            'name'          => 'required|min:3|max:95',
            'address'       => 'required',
            'description'   => 'required',
            'image'         => 'required|file|image|max:1999|mimes:png,jpg,jpeg',
        ]);

        if (request()->hasFile('image')) {
            File::delete(public_path('upload/' . $hotel->path_image));
            $file_with_ext = request()->file('image')->getClientOriginalName();
            $file_ext = request()->file('image')->getClientOriginalExtension();
            $file_name_new = rand(4444, 1111) . time() . '.' . $file_ext;
            $file_path = request()->file('image')->storeAs('/images/hotels/', $file_name_new);
        }

        $hotel->update([
            'user_id'       => auth()->user()->id,
            'name'          => request('name'),
            'address'       => request('address'),
            'description'   => request('description'),
            'path_image'    => $file_path ?? $hotel->path_image,
        ]);
        return redirect()->back()->with('success', trans('admin.update_success'));
    }

    public function delete($id) {
        $hotel = Hotel::where('id', $id)->first();
        if(!empty($hotel)) {
            File::delete(public_path('upload/' . $hotel->path_image));
            $hotel->delete();
            return redirect()->route('viewHotels')->with('success', trans('admin.delete_success'));
        } else {
            return 'Not Found';
        }
    }

    public function view() {
        $hotels = Hotel::get();
        return view('admin.hotels.view_hotels', compact('hotels'));
    }
}
