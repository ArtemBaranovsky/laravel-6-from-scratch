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



Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
//Route::get('/articles/{foobar}', 'ArticlesController@show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}/update', 'ArticlesController@update');
Route::put('/articles/{article}', 'ArticlesController@update');
Route::post('/posts/{post}', 'PostsController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
