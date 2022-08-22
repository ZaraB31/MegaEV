<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandImage;

class BrandImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image_id' => 'required',
        ]);

        $brand = $request['brand_id'];

        $input = $request->all();

        BrandImage::create($input);

        return redirect()->route('showBrand', [$brand]);
    }
}
