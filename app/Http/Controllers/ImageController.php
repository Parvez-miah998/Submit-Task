<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ImageController extends Controller
{
    public function index()
    {
        $data = DB::table('images')->get();
        return view('upload', compact('data'));
    }

    //__this is for store image__//
    public function store(Request $request)
    {
        //Validation check
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images/'), $imageName);

        $data['filepath']='images/'.$imageName;

        //__this query builder for storing data into database__//
        DB::table('images')->insert($data);
        return redirect()->back()->with('success', 'Image uploaded successfully');
    }
}
