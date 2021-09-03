<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PanelController extends Controller
{

    protected function validator($data)
    {
        $validated =  Validator::make($data, [
            'name' => 'required|max:255|regex:/^[a-zżźćńółęąśŻŹĆĄŚĘŁÓŃA-Z0-9\s]+$/',
            'title' => 'nullable|regex:/^[a-zżźćńółęąśŻŹĆĄŚĘŁÓŃA-Z0-9\s]+$/',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
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
        return view('panel.index', [
            'posts' => Post::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.form', [
            'action' => 'store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $data = $this->validator($request->all());
        $post->fill($data);
        if (isset($data['image'])) {
            $post->image = $request->file('image')->store('photos');
        }
        $post->save();
        return redirect(route('panel.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
 
        return view("panel.form", [
            'post' => $post,
            'action' => 'update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $this->validator($request->all());
        $post->fill($data);

        $oldImage = Post::find($post->id)->image;

        if (isset($data['image'])) {
            if ($oldImage) {
                unlink(storage_path('app/public/'.$oldImage));
            }
            $path = $request->file('image')->store('photos');
            $data['image'] = $path;
        }

        $post->update($data);
 
        return redirect(route('panel.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        Storage::delete($post->image);

        Session::flash('message', "Post has been deleted.");

        return redirect(route('panel.index'));
    }
}
