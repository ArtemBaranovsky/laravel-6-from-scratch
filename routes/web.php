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

/*app()->bind('App\Example', function () {    // moved to AppServiceProvider@register
    $collaborator = new \App\Collaborator();
    $foo = 'foobar';
    return new \App\Example($collaborator, $foo);
});*/
/*app()->bind('example', function () {
//    $foo = config('services.foo');
    return new \App\Example();
//    return new \App\Example($foo);
});*/

Route::get('conversations', 'ConversationsController@index');
//Route::get('conversations/{conversation}', 'ConversationsController@show');
Route::get('conversations/{conversation}', 'ConversationsController@show')->middleware('can:view,conversation');

Route::post('best-replies/{reply}', 'ConversationBestReplyController@store');


Route::get('notifications', 'UserNotificationsController@show')->middleware('auth');
Route::get('payments/create', 'PaymentsController@create')->middleware('auth');
Route::post('payments', 'PaymentsController@store')->middleware('auth');
//Route::get('/', 'PagesController@home');
/*//Route::get('/', function () {
Route::get('/', function (App\Example $example) {
//    $example = resolve('example');
//    $example = resolve('App\Example');
//    $example = resolve(App\Example::class);     // explicitly resolving Example out of the container
//    $example = app()->make(App\Example::class);        // if you want it to match what we have up here (app()->bind()...)
    ddd($example);
});*/

auth()->loginUsingId(3);
Route::get('/', function () {
    return view('welcome');
/*    $container = new \App\Container();              // More typically it would go in what we call a Service Provider
    $container->bind('example', function () {
        return new \App\Example();
    });
    $example = $container->resolve('example');
    $example->go();*/
//    ddd($example);
});
Route::get('/reports', function () {
    return 'the secret reports';
})->middleware('can:view_reports');

Route::get('/contact', 'ContactController@show');
Route::post('/contact', 'ContactController@store');
//Route::get('/contact', function () {
//    return view('contact');
//});

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
