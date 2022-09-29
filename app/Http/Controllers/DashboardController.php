<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use App\Models\Social;
use App\Models\Brand;
use App\Models\Product;
use App\Models\User;

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
        $socials = Social::all();
        $brands = Brand::all();
        $products = Product::all();
        $users = User::all();
        return view('dashboard', ['details' => $details,
                                  'socials' => $socials,
                                  'brands' => $brands,
                                  'products' => $products,
                                  'users' => $users]);
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

    public function updateDetails(Request $request, $id) {
        $detail = Detail::findOrFail($id);

        $detail->update($request->all());

        return redirect('/admin');
    }

    public function createSocials(Request $request) {
        $this->validate($request, [
            'facebookName' => 'required',
            'facebookLink' => 'required',
            'twitterName' => 'required',
            'twitterLink' => 'required'
        ]);

        $input = $request->all();

        Social::create($input);

        return redirect('/admin');
    }

    public function updateSocials(Request $request, $id) {
        $social = Social::findOrFail($id);

        $social->update($request->all());

        return redirect('/admin');
    }

    public function showUser($id) {
        $user = User::findOrFail($id);

        return view('admin/users/show', ['user' => $user]);
    }
}
