<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display's index page
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Display's dashboard page
     *
     * @return Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('dashboard');
    }
}
