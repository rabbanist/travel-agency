<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminBlogCategoryController extends Controller
{
    public function index(){
        $blog_categories = BlogCategory::get();
        return view('admin.pages.blog-category.index', compact('blog_categories'));
    }

    public function create(){
        return view('admin.pages.blog-category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:blog_categories',
        ]);

        $blog_category = new BlogCategory();
        $blog_category->name = $request->name;
        $blog_category->slug = $request->slug;
        $blog_category->save();

        return redirect()->route('admin.blog_category.index')->with('success', 'Blog Category Created Successfully');
    }

    public function edit($id){
        $blog_category = BlogCategory::find($id);
        return view('admin.pages.blog-category.edit', compact('blog_category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:blog_categories,slug,'.$id,
        ]);

        $blog_category = BlogCategory::find($id);
        $blog_category->name = $request->name;
        $blog_category->slug = $request->slug;
        $blog_category->save();

        return redirect()->route('admin.blog_category.index')->with('success', 'Blog Category Updated Successfully');
    }

    public function delete($id){
        $total = Post::where('blog_category_id', $id)->count();
        if($total > 0){
            return back()->with('error', 'This category has posts. So, you can not delete this category');
        }
        BlogCategory::where('id', $id)->first()->delete();
        return redirect()->route('admin.blog_category.index')->with('success', 'Blog Category Deleted Successfully');
    }
}
