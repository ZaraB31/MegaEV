<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use App\Models\ArticleImage;

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
        $featuredImage = ArticleImage::where('article_id', $id)->where('featured', 1)->first();
        return view('admin/articles/show', ['article' => $article,
                                            'images' => $images,
                                            'featuredImage' => $featuredImage]);
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
}
