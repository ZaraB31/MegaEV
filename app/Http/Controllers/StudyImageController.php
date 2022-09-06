<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Study;
use App\Models\Image;
use App\Models\StudyImage;

class StudyImageController extends Controller
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

        $studyId = $request['study_id'];

        $input = $request->all();

        StudyImage::create($input);

        return redirect()->route('showStudy', $studyId);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGallery(Request $request)
    {
        $this->validate($request, [
            'image_id' => 'required',
        ]);

        $studyId = $request['study_id'];

        foreach ($request->get('image_id') as $image_id) {
            $studyGallery = StudyImage::create([
                'study_id' => $request['study_id'],
                'image_id' => $image_id,
                'featured' => '0',
            ]);
        }

        return redirect()->route('showStudy', $studyId);
    }
}
