<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
//    $article = App\Article::all();
//    $article = App\Article::latest()->get(); // desc created_at
//    $article = App\Article::latest('updated_at')->get();
//    $article = App\Article::latest('published_at')->get();
//    $article = App\Article::take(2)->get();
//    $article = App\Article::paginate(2);
//    return $article;
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/posts/{post}', 'PostsController@show');
/*Route::get('/post/{post}', function ($post) {
    $posts = [
        'my-first-post' => 'Hello, this is my first blog post!',
        'my-second-post' => 'Now I am getting the hang of this blogging thing.'
    ];
    if (!array_key_exists($post, $posts)) {
        abort(404, 'Sorry that post was not found.');
    }
    return view('post', [
//        'post' => $posts[$post] ?? 'Nothing here yet.'
        'post' => $posts[$post]
    ]);
});*/
