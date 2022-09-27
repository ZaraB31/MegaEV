<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use App\Models\ArticleImage;
use App\Models\Tag;
use App\Models\ArticleTag;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all()->sortBy('updated_at');
        return view('admin/articles/index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/articles/create');
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
           'name' => 'required|unique:articles',
           'details' => 'required',
        ]);

        $input = $request->all();

        Article::create($input);

        return redirect('/admin/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $images = Image::all()->sortByDesc('created_at');
        $tags = Tag::all();
        $featuredImage = ArticleImage::where('article_id', $id)->where('featured', 1)->first();
        $articleTags = ArticleTag::where('article_id', $id)->get();
        return view('admin/articles/show', ['article' => $article,
                                            'images' => $images,
                                            'featuredImage' => $featuredImage,
                                            'tags' => $tags,
                                            'articleTags' => $articleTags]);
    }

    public function publish(Request $request) {
        $id = $request['id'];
        $article = Article::findOrFail($id);
        $article->draft = "1";
        $article->update();
        return redirect()->route('showArticle', $id);
    }

    public function unpublish(Request $request) {
        $id = $request['id'];
        $article = Article::findOrFail($id);
        $article->draft = "0";
        $article->update();
        return redirect()->route('showArticle', $id);
    }

    public function edit($id) {
        $article = Article::findOrFail($id);

        return view('admin/articles/edit', ['article' => $article]);
    }

    public function update(Request $request, $id) {
        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect()->route('showArticle', $id);
    }

    public function delete($id) {
        $article = Article::find($id);
        $article->delete();
        return redirect('/admin/articles');
    }
}
