<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductImage;

class ProductImageController extends Controller
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
            'product_id' => 'required',
            'image_id' => 'required',
        ]);

        $id = $request['product_id'];

        $input = $request->all();

        ProductImage::create($input);

        return redirect()->route('showProduct', $id);
    }

    public function update(Request $request, $id) {
        $productImage = ProductImage::findOrFail($id);
        $id = $productImage['product_id'];
        $productImage->update($request->all());
        return redirect()->route('showProduct', $id);
    }
}
