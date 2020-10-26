<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        // render a list of a resource
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id)
    {
        // show a single resource
        $article = Article::find($id);
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function create()
    {
        // shows a view to create a new resource
    }

    public function store()
    {
        // persist a new resource
    }

    public function edit()
    {
        // show a view to edit an existing resource
    }

    public function update()
    {
        // persist the edited resource
    }

    public function delete()
    {
        // delete an existing resource
    }


}
