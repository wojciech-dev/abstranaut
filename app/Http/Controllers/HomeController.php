<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $section_1 = Post::where('id', 6)->get();

        return view('home', [
            'section_1' => $section_1
        ]);
    }
}
