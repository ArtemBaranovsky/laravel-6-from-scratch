<?php


namespace App\Http\Controllers;

use App\Post;

class PostsController  extends Controller
{
    /**
     * @param $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
//        $post = \DB::table('posts')->where('slug', $slug)->first();
//        $post = Post::where('slug', $slug)->first();
//        $post = Post::where('slug', $slug)->firstOrFail();

        //        if (!$post) {
//            abort(404, 'Sorry that post was not found.');
//        }
        return view('post', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
