<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
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
        $tags = Tag::all()->sortByDesc('updated_at');
        return view('admin/articleTags/index', ['tags' => $tags]);
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
            'tag' => 'required'
        ]);

        $input = $request->all();

        Tag::create($input);

        return redirect('/admin/tags');
    }

    public function update(Request $request, $id) {

        $tag = Tag::findOrFail($id);
        $tag->update($request->all());
        return redirect('/admin/tags');
    }
}
