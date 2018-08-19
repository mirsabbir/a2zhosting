<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Draft;
use Image;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show','showExtra']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = \App\Post::latest()->paginate(10);
        return view('posts')->with(['results'=>$results, 'q'=>5]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = $request->all();
        $r['slug'] = str_slug($r['slug'],'-');
        
    
        $validatedData = \Validator::make($r, [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'slug' => 'unique:posts|alpha_dash|required|max:255',
            'image' => 'required',
            'category_id' => 'required'
        ]);
        // data is valid
        
        // validate image
        $img = $request->file('image');
        $name = time().$img->getClientOriginalExtension();
        $location = public_path('images/'.$name);
        $path = 'images/'.$name;
        Image::make($img)->resize(500,300)->save($location);

        

        
        $post = new Post;
        
        $post->title = $request->title;
        $post->slug = $r['slug'];
        $post->image = $path;
        $post->body = $request->content;
        $post->count = 0;
        $category = Category::findOrFail($request->category_id);
        
        $category->posts()->save($post);
        
        return '/'.$category->name.'/'.$post->slug;
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //return view('editor.post')->with(['post'=>$post]);
    }

    public function showExtra(Category $category,Post $post)
    {
        return view('post')->with(['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('editor.edit')->with(['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {   
        
        
        // data is valid
        
        // validate image
        if($request->has('image')){
            $img = $request->file('image');
            $name = time().$img->getClientOriginalExtension();
            $location = public_path('images/'.$name);
            $path = 'images/'.$name;
            Image::make($img)->resize(500,300)->save($location);
            $post->image = $path;
        }
        
        
        
        
        
        if($request->has('title'))
        $post->title = $request->title;
        
        if($request->has('content'))
        $post->body = $request->content;
        
        $category = Category::findOrFail($request->category_id);
        
        $category->posts()->save($post);
        
        return redirect('/'.$category->name.'/'.$post->slug);
        
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

    public function all(Request $request){
        
        if($request->save){
            $this->saveAsDraft($request);
            $request->session()->flash('saved', 1);
            return redirect()->back();
        } else if($request->preview){
            
            $validatedData = $request->validate([
                'title' => 'required|unique:posts|max:255',
                'content' => 'required',
                'slug' => 'unique:posts|alpha_dash|required|max:255',
                'image' => 'required',
                'category_id' => 'required'
            ]);
            // data is valid
            
            // validate image
            $img = $request->file('image');
            $name = time().$img->getClientOriginalExtension();
            $location = public_path('images/'.$name);
            $path = 'images/'.$name;
            Image::make($img)->resize(500,300)->save($location);
    
            
    
            
            $post = new Post;
            
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->image = $path;
            $post->body = $request->content;
            $post->count = 0;

            return view('editor.post')->with(['post' => $post]);
        } else {
            $ret = $this->store($request);
            return redirect($ret);
        }
    }
    public function saveAsDraft(Request $request){
        
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
            'slug' => 'unique:posts|alpha_dash|required|max:255',
            'image' => 'required',
            'category_id' => 'required'
        ]);
        // data is valid
        
        // validate image
        $img = $request->file('image');
        $name = time().$img->getClientOriginalExtension();
        $location = public_path('images/'.$name);
        $path = 'images/'.$name;
        Image::make($img)->resize(500,300)->save($location);

        

        
        $draft = new Draft;
        
        $draft->title = $request->title;
        $draft->slug = $request->slug;
        $draft->image = $path;
        $draft->body = $request->content;
        $draft->count = 0;

        $category = Category::findOrFail($request->category_id);
        
        $category->drafts()->save($draft);
    }

    
}
