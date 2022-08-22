<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = Image::all();

        return view('admin/gallery/index', ['images' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required',
            'description' => 'required',
        ]);

        $photo = $request->file('file');
        $photoName = date('Y-m-d').'-'.time().'.'.$photo->getClientOriginalExtension();
        $target_path    =   public_path('/uploads/images');

        $photo->move($target_path, $photoName);

        $upload = Image::create(['name' => $request['name'], 
                                 'file' => $photoName,
                                 'description' => $request['description']]);
                            
        return view('/admin/gallery/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::findOrFail($id);

        return view('admin/gallery/show', compact('image'));
    }
}
