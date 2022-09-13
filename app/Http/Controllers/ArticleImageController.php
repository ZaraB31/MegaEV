<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleImage;

class ArticleImageController extends Controller
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
    public function storeFeatured(Request $request)
    {
        $this->validate($request, [
            'image_id' => 'required',
        ]);

        $articleId = $request['article_id'];

        $input = $request->all();

        ArticleImage::create($input);

        return redirect()->route('showArticle', $articleId);
    }
}
