<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Events\NewPostPublished;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json(['data' => $posts]);
    }

    public function store(StorePostRequest $storePostRequest)
    {
        $post = Post::create($storePostRequest->validated());

        event(new NewPostPublished($post));

        return response()->json(['message' => 'Post created successfully', 'data' => $post], 201);
    }

    public function show(Post $post)
    {
        $post = Post::findOrFail($post->id);
        return response()->json(['data' => $post]);
    }

    public function update(UpdatePostRequest $updatePostRequest, Post $post)
    {
        $post = Post::findOrFail($post->id);
        $post->update($updatePostRequest->validated());

        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        $post = Post::findOrFail($post->id);
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
