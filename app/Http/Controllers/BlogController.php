<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    public function __construct()
    {

        $this->middleware('Authenticate')->only('create');
        $this->middleware('auth')->only('myBlogs');
    }

    public function myBlogs()
    {
        $blogs = Blog::where('user_id', auth()->user()->id)->paginate(10);
        return view('theme.blogs.my-blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if(auth()->user()){
        $categories = Category::get();
        return view('theme.blogs.create', compact('categories'));
        // }
        //     abort(403);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        // get image
        $image = $request->image;
        //change current name
        $newImageName = rand(0, 100) . time() . rand(0, 100) . '-' . $image->getClientOriginalName();
        //move image to folder
        $image->storeAs('blogs', $newImageName, 'public');
        //save image name to database
        $data['image'] = $newImageName;
        $data['user_id'] = auth()->user()->id;
        //save data to database
        Blog::create($data);
        return back()->with('success', 'Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if($blog->user_id==auth()->user()->id){


            $categories = Category::get();
            return view('theme.blogs.edit', compact('categories','blog'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if($blog->user_id==auth()->user()->id){

        $data = $request->validated();
        if($request->hasFile('image')){

            // delete old image
            Storage::delete("public/blogs/$blog->image");
            // get image
            $image = $request->image;
            //change current name
            $newImageName = rand(0, 100) . time() . rand(0, 100) . '-' . $image->getClientOriginalName();
            //move image to folder
            $image->storeAs('blogs', $newImageName, 'public');
            //save image name to database
            $data['image'] = $newImageName;
            }

        $data['user_id'] = auth()->user()->id;
        //save data to database
        $blog->update($data);
        return back()->with('successUpdate', 'Blog Updated Successfully');
    }
    abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // dd($blog);
        if($blog->user_id==auth()->user()->id){

            Storage::delete("public/blogs/$blog->image");
            $blog->delete();
            return back()->with('successDelete', 'Blog Deleted Successfully');
        }
        abort(403);
        }
    }
