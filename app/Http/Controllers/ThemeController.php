<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $blogs=Blog::latest()->paginate(5);
        $sliderBlogs=Blog::latest()->take(5)->get();
        return view('theme.index',['blogs'=>$blogs,'sliderBlogs'=>$sliderBlogs]);
    }
    public function contact()
    {
        return view('theme.contact');
    }
    public function category($id)
    {
        $blogs=Blog::where('category_id',$id)->paginate(5);
        $categoryName=Category::select('name')->find($id)->name;
        $categories= Category::take(2)->get();

        return view('theme.category',['blogs'=>$blogs,'categoryName'=>$categoryName,'categories'=>$categories]);


    }
    public function singleBlog()
    {
        return view('theme.single-blog');
    }
    public function login()
    {
        return view('theme.login');
    }
    public function register()
    {
        return view('theme.register');
    }
}
