<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{

    protected function validator($data)
    {
        $validated =  Validator::make($data, [
            'name' => 'required|max:255|regex:/^[a-zżźćńółęąśŻŹĆĄŚĘŁÓŃ?A-Z0-9\s]+$/',
            'desc' => 'nullable'
        ])->validate();

        return $validated;
    }

 /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {   
        return view('panel.faq', [
            'posts' => Faq::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.faqForm', [
            'action' => 'store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faq $post)
    {
        $data = $this->validator($request->all());
        $post->fill($data);
        $post->save();
        return redirect(route('faq.index')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $post)
    {
 
        return view("panel.faqForm", [
            'post' => $post,
            'action' => 'update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $post)
    {
        $data = $this->validator($request->all());
        $post->fill($data);

        $post->update($data);
 
        return redirect(route('faq.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $post)
    {
        $post->delete();

        Session::flash('message', "Post has been deleted.");

        return redirect(route('faq.index'));
    }
}
