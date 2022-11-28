<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  // GET
    {
        //
        // return "Hey I am index page";

        // $posts = Post::all();
        $posts = Post::paginate(5);
        // return $posts;
        // dd($posts);

        return view('post.index',compact('posts'));  // .(dot) means /(back slash)
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // GET
    {
        //
        // return "Hey I am create page";
        return view('post.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // POSt
    {
        //

        // dd('Hey I am working'); // dd = die or done
        // return "Hi Hello";
        $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Post::create([
            'title' => $request -> title,
            'content' => $request -> content
        ]);
        return redirect('/posts')->with('successAlert','You have successfull created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // GET
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // GET
    {
        //
        // return "Hey I am edit page";

        $post = Post::find($id);
        // dd($post);
        // dd($post -> id);

    return view('post.edit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) // PUT / PATCH
    {
        //
        // dd('update success !');
        $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Post::find($id) -> update([
            'title' => $request -> title,
            'content' => $request -> content,
        ]);
        return redirect('/posts')->with('successAlert','You have successfull updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // DELETE
    {
        //

        // dd($id);
        Post::find($id)->delete();
        return redirect('/posts')->with('successAlert','You have successfully deleted!');

    }
}


// Route::get('/', function () {
//     return view('post.create');
// });

// Route::get('posts', [PostController::class, 'create']);




/*
! error maybe route
*/