<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }



    public function index()
    {
        //if you don't want to use eloquent meaning normal sql queries
        //$posts = DB::select('select * from posts ORDER BY title DESC ');

        //Bunch of cool functions in case you need them
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //return Post::where('title','Post Two')->get();
        //$posts = Post::all();

        //Paginate makes pages more organized and avoid scrolling down for example 10 posts per pages it's done automatically
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        //loading the view
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'title' => 'required',
        'body' => 'required',
        //Image ( png,jpg...etc),nullable => optional , max 1999 => image size less then 2Megabits
        'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')) {

            //Get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just filename | using plain old PHP
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //Get just Extension | using laravel
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            /* File name to store | we concatenate the file name with time function to make it unique
             in case another user type the same name there will not be any conflicts or errors with the
             exiting file  */
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload and save Image to path | make sure that you already used the symlink storage directory using artisan command
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        }else {
            //Default image in case user do not specify any
            $fileNameToStore = 'noimage.jpg';
        }

        //Create Post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        //loading the view
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorised Access');
        }

        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            //Image ( png,jpg...etc),nullable => optional , max 1999 => image size less then 2Megabits
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if($request->hasFile('cover_image')) {

            //Get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            //Get just filename | using plain old PHP
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            //Get just Extension | using laravel
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            /* File name to store | we concatenate the file name with time function to make it unique
             in case another user type the same name there will not be any conflicts or errors with the
             exiting file  */
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload and save Image to path | make sure that you already used the symlink storage directory using artisan command
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }

        //Update Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        return redirect('#')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorised Access');
        }

        if($post->cover_image != 'noimage.jpg'){
            //Delete the image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();

        return redirect('/posts')->with('success','Post Removed');
    }
}
