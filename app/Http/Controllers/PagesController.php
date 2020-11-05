<?php

namespace App\Http\Controllers;

use App\Example;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
/*    public function home(Example $example)
//    public function home()
    {
//        ddd(resolve('App\Example'), resolve('App\Example'));
        ddd($example);
    }*/


/*//    public function home()        // no need to pass params if using facades
    public function home(Filesystem $file)
    {
        return $file->get(public_path('index.php'));
//        return File::get(public_path('index.php'));
        //        return request('name');
        return Request::input('name');    // the same with facade
//        return view('welcome');    // we can use helper function
        return View::make('welcome');  // we can also use Facade
    }*/

    public function home()
    {
//        return redirect('welcome');
//        return Redirect::to('welcome');
//        Cache::remember('foo', 60, fn() => 'foobar'); // php 7.4 arrow function
        Cache::remember('foo', 60, function () { return 'foobar'; });
        return Cache::get('foo');
    }
}
