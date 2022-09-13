<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleTag;

class ArticleTagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function assignTags(Request $request) 
    {
        $this->validate($request, [
            'tag_id' => 'required',
        ]);

        $articleId = $request['article_id'];

        foreach ($request->get('tag_id') as $tag_id) {
            $articleTags = ArticleTag::create([
                'article_id' => $request['article_id'],
                'tag_id' => $tag_id,
            ]);
        }

        return redirect()->route('showArticle', $articleId);
    }
}
