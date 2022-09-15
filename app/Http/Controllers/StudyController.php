<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Study;
use App\Models\Image;
use App\Models\StudyImage;

class StudyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $studies = Study::all();
        return view('admin/caseStudies/index', ['studies' => $studies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/caseStudies/create');
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
            'name' => 'required|unique:studies',
            'content' => 'required',
            'testimony' => 'required',
            'testimonyAuthor' => 'required'
        ]);

        $input = $request->all();

        Study::create($input);

        return redirect('/admin/caseStudies');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $study = Study::findOrFail($id);
        $images = Image::all()->sortByDesc('created_at');
        $featuredImage = StudyImage::where('study_id', $id)->where('featured', 1)->first();
        $galleryImages = StudyImage::where('study_id', $id)->where('featured', 0)->get();
        return view('admin/caseStudies/show', ['study' => $study, 
                                               'images' => $images, 
                                               'featuredImage' => $featuredImage,
                                               'galleryImages' => $galleryImages]);
    }

    public function publish(Request $request) {
        $id = $request['id'];
        $study = Study::findOrFail($id);
        $study->draft = "1";
        $study->update();
        return redirect()->route('showStudy', $id);
    }

    public function unpublish(Request $request) {
        $id = $request['id'];
        $study = Study::findOrFail($id);
        $study->draft = "0";
        $study->update();
        return redirect()->route('showStudy', $id);
    }
}
