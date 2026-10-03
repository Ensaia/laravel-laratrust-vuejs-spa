<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
      $post = Post::create($request->validated());
      new PostResource($post);
      return ResponseController::dataCreated($post);
    }

    /**
     * Display the specified resource.
     */
    public function edit(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
      $post->update($request->validated());
      new PostResource($post);
      return ResponseController::dataUpdated($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
      $post->delete();
      return response()->noContent();
    }
}
