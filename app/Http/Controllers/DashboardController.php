<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;

class DashboardController extends Controller
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
        $details = Detail::all();
        return view('dashboard', ['details', $details]);
    }

    public function createDetails(Request $request) {
        $this->validate($request, [
            'address1' => 'required',
            'address2' => 'required',
            'address3' => 'required',
            'postcode' => 'required|max:7',
            'phone' => 'required|digits:11',
            'email' => 'required'
        ]);

        $input = $request->all();

        Detail::create($input);

        return redirect('/admin');
    }
}
