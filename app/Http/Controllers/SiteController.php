<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $post = Post::orderBy('id', 'DESC')->with('user', 'user.profile')->get();

        return view('index', [
            'post' => $post
        ]);
    }
}
