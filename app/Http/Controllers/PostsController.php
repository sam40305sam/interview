<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(5);//->paginate(5);
        $data = [
            'posts' => $posts
        ];

        return view('home', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:25',
            'content' => 'required|min:5|max:255',
        ]);
        $data=[
            'title'=> $request->title, 
            'content'=> $request->content, 
            'author'=> auth()->user()->name, 
        ];
        Post::create($data);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Post  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $id)
    {
        $data = [
            'post' => $id,
        ];
        return view('post', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Post  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $id)
    {
        $this->authorize('update', $id);
        $data = [
            'post' => $id,
        ];
        return view('posteditor', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Post  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $id)
    {
        $this->validate($request, [
            'title' => 'required|min:5|max:25',
            'content' => 'required|min:5|max:255',
        ]);
        $this->authorize('update', $id);
        $id->update($request->all());
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $id)
    {
        $this->authorize('delete', $id);
        Post::destroy($id->id);
        return redirect()->route('home');
    }
}
