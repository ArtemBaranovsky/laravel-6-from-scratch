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
        return view('articles.create');
    }

    public function store()
    {
        // validation
        request()->validate([
//            'title' => ['required', 'min:3', 'max:255'],
//            'title' => 'required|min:3|max:255',
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        // clean up
        $article = new Article();
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();
        return redirect('/articles');
    }

    public function edit($id)
    {
        // find the article associated with the ID in the URI
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    public function update($id)
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        $article = Article::find($id);
        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');
        $article->save();
        return redirect('/articles/' . $article->id);
    }

    public function delete()
    {
        // delete an existing resource
    }


}
