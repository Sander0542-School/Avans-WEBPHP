<?php

namespace App\Http\Controllers;

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
}
