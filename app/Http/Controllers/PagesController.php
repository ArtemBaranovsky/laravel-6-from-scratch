<?php

namespace App\Http\Controllers;

use App\Example;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(Example $example)
//    public function home()
    {
//        ddd(resolve('App\Example'), resolve('App\Example'));
        ddd($example);
    }
}
