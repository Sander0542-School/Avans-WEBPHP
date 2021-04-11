<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function events()
    {
        return view('home.events');
    }

    public function restaurants()
    {
        return view('home.restaurants');
    }

    public function language(Request $request)
    {
        $locale = $request->get('language', config('app.locale'));
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
