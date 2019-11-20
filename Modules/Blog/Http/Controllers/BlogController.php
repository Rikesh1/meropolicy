<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Blog;
use Modules\Blog\Http\Requests\StoreRequest;
use Modules\Blog\Http\Requests\UpdateRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog::blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('blog::blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->status = $request->status;
        $blog->author = $request->author;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->tab_title = $request->tab_title;

        if ($request->has('image')) {
            $image = $request->file('image');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('/uploads/blogs/'), $filename);
            $blog->image = $filename;
        }

        $blog->save();

        return redirect()->back()->with('success', 'New Blog Post Added Successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog::blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateRequest $request, Blog $blog)
    {
        $blog->title = $request->title;
        if ($request->has('slug')) {
            $blog->slug = $request->slug;
        }
        $blog->description = $request->description;
        $blog->status = $request->status;
        $blog->author = $request->author;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->tab_title = $request->tab_title;

        if ($request->has('image')) {
            if ($blog->image != null && file_exists(public_path('/uploads/blogs/') . $blog->image)) {
                unlink(public_path('/uploads/blogs/') . $blog->image);
            }
            $image = $request->file('image');
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('/uploads/blogs/'), $filename);
            $blog->image = $filename;
        }

        $blog->update();

        return redirect()->route('blog.index')->with('success', 'Blog Post Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog->image != null && file_exists(public_path('/uploads/blogs/') . $blog->image)) {
            unlink(public_path('/uploads/blogs/') . $blog->image);
        }
        $blog->delete();

        return redirect()->back()->with('success', 'Blog Post Deleted Successfully.');
    }
}
