<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
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
        $enquiries = Enquiry::all()->sortByDesc('created_at');
        return view('admin/enquiries/index', ['enquiries' => $enquiries]);
    }

    public function destroy($id) {

        $enquiry = Enquiry::findOrFail($id);
        $enquiry->delete();
        return redirect('/admin/enquiries');
    }
}
