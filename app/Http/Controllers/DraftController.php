<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Draft;

class DraftController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drafts = Draft::with('category')->paginate(3);
        return view('editor.drafts')->with(['drafts'=>$drafts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editor.draft-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Draft $draft
     * @return \Illuminate\Http\Response
     */
    public function show(Draft $draft)
    {
        return view('editor.post')->with(['post' => $draft]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Draft $draft
     * @return \Illuminate\Http\Response
     */
    public function edit(Draft $draft)
    {
        return view('editor.draft-edit')->with(['post'=>$draft]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Draft $draft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Draft $draft)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Draft $draft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Draft $draft)
    {   
        $draft->delete();
        return redirect('/drafts');
    }
    public function all(Request $request,Draft $draft){
        if($request->update){
            $validatedData = $request->validate([
                'title' => 'required|unique:posts|max:255',
                'content' => 'required',
                'slug' => 'unique:posts|alpha_dash|required|max:255',
                'category_id' => 'required'
            ]);
            // data is valid
            
            // validate image
            if($request->has('image')){
                $img = $request->file('image');
                $name = time().$img->getClientOriginalExtension();
                $location = public_path('images/'.$name);
                $path = 'images/'.$name;
                Image::make($img)->resize(500,300)->save($location);
                $draft->image = $path;
            }
            
    
            
            
            
            $draft->title = $request->title;
            $draft->slug = $request->slug;
            
            $draft->body = $request->content;
            $draft->count = 0;
            
            $draft->save();
            
    
            return redirect('/drafts/'.$draft->slug);
        } else{
            $validatedData = $request->validate([
                'title' => 'required|unique:posts|max:255',
                'content' => 'required',
                'slug' => 'unique:posts|alpha_dash|required|max:255',
                'category_id' => 'required'
            ]);
            // data is valid
            
            // validate image
            if($request->has('image')){
                $img = $request->file('image');
                $name = time().$img->getClientOriginalExtension();
                $location = public_path('images/'.$name);
                $path = 'images/'.$name;
                Image::make($img)->resize(500,300)->save($location);
                $draft->image = $path;
            }
            
    
            
            
            
            $draft->title = $request->title;
            $draft->slug = $request->slug;
            
            $draft->body = $request->content;
            $draft->count = 0;

            $post = new \App\Post;

            $post->title = $draft->title;
            $post->slug = $draft->slug;
            $post->image = $draft->image;
            $post->body = $draft->body;
            $post->count = 0;
            $category = \App\Category::findOrFail($draft->category_id);
            
            $category->posts()->save($post);
            
            return redirect('/'.$category->name.'/'.$post->slug);

        }
    }
}
