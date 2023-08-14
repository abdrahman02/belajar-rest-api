<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostStoreResource;
use App\Http\Resources\PostUpdateResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user:id,username')->get();

        return PostResource::collection($posts);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'news_content' => 'required',
        ]);

        $item = new Post();
        $item->title = $request->title;
        $item->news_content = $request->news_content;
        $item->author = auth()->user()->id;
        $item->save();

        return new PostStoreResource($item->loadMissing('user:id,username'));
    }


    public function show($id)
    {
        $post = Post::with('user:id,username')->findOrFail($id);

        return new PostDetailResource($post);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'news_content' => 'required',
        ]);

        $item = Post::findOrFail($id);

        $item->title = $request->title;
        $item->news_content = $request->news_content;
        $item->author = auth()->user()->id;
        $item->save();

        return new PostUpdateResource($item->loadMissing('user:id,username'));
    }


    public function destroy($id)
    {
        $item = Post::findorFail($id);

        $item->delete();

        return response()->json([
            'alert' => 'Berhasil menghapus postingan'
        ]);
    }
}
