<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogService $blogService)
    {
        $blogs = $blogService->get_blogs();
        return view('front.blogs.index', compact('blogs'));
    }

    public function getMoreBlogs(Int $last_blog_id, Int $limit, BlogService $blogService)
    {
        $blogs = $blogService->get_blogs($last_blog_id, $limit);

        if($blogs->count() > 0)
        {
            return response()->json([
                'message' => __('response.get-more-blogs-success'),
                'content' => view('components.blogs-list', compact('blogs'))->render(),
                'length' => $blogs->count() >= $limit ? $limit : $blogs->count(),
                'last_blog_id' => $blogs->last()?->id
            ]);
        }
        else
        {
            return response()->json([
                'errors' => ['data' => [__('response.no-blogs')]]
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('front.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
