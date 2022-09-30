<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user', 'category.posts', 'tags')->paginate(25);
        foreach ($posts as $post) {
            if (substr($post->post_image, 0, 4) != 'http') {
                $post->post_image = '/storage/' . $post->post_image;
            }
        }
        return response()->json([
            'response' => true,
            // 'count' => count($posts),
            'results' => $posts
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::findOrFail($id);
        // return response()->json([
        //     'response' => true,
        //     'results' =>['data' => $post]
        // ]);

        $post = Post::with('category', 'user')->find($id);
        if (substr($post->post_image, 0, 4) != 'http') {
            $post->post_image = '/storage/' . $post->post_image;
        }
        if ($post) {
            return response()->json([
                'response' => true,
                'results' => $post
            ]);
        }
        
        else return response('', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return response('', 204);
    }

    public function searchPosts($title){
        $post = Post::with('category', 'user')->where('title', $title)->get();
        if (substr($post->post_image, 0, 4) != 'http') {
            $post->post_image = '/storage/' . $post->post_image;
        }
        if ($post) {
            return response()->json([
                'response' => true,
                'results' => $post
            ]);
        }
        
        else return response('', 404);
    }
}
