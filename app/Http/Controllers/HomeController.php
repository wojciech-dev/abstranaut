<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Faq;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $section_1 = Post::where('id', 1)->get();
        $section_2 = Post::where('id', 2)->get();
        $section_3 = Post::where('id', 3)->get();
        $section_4 = Post::where('id', 4)->get();
        $faq = Faq::get();


        return view('home', [
            'section_1' => $section_1,
            'section_2' => $section_2,
            'section_3' => $section_3,
            'section_4' => $section_4,
            'faq' => $faq,
        ]);
    }
}
