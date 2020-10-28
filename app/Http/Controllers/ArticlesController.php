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

//    public function show($id)
//    public function show(Article $foobar)
    public function show(Article $article)
    {
//        $article = Article::findOrFail($id);
//        return $article;
//        Article::where('id', 1)->first();
        return view('articles.show', [
            'article' => $article
//            'article' => $foobar

        ]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        // validation
        //        dd($validatedAttributes);
//        request()->validate([
/*        $validatedAttributes = request()->validate([
//            'title' => ['required', 'min:3', 'max:255'],
//            'title' => 'required|min:3|max:255',
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);*/
        // clean up
//        $article = new Article();
//        $article->title = request('title');
//        $article->excerpt = request('excerpt');
//        $article->body = request('body');
//        $article->save();
/*        Article::create([
            'title' => request('title'),
            'excerpt' =>  request('excerpt'),
            'body' =>  request('body'),
        ]);*/
//        Article::create($validatedAttributes);
/*        Article::create(request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]));*/
        Article::create($this->validateArticle());
        return redirect('/articles');
    }

//    public function edit($id)
    public function edit(Article $article)
    {
//        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

//    public function update($id)
    public function update(Article $article)
    {
/*        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);*/
//        $article = Article::find($id);
//        $article->title = request('title');
//        $article->excerpt = request('excerpt');
//        $article->body = request('body');
//        $article->save();
/*        Article::create([
            'title' => request('title'),
            'excerpt' =>  request('excerpt'),
            'body' =>  request('body')
        ]);*/
        $article->update($this->validateArticle());

        return redirect('/articles/' . $article->id);
    }

    public function delete()
    {
        // delete an existing resource
    }

    /**
     * @return array
     */
    protected function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }


}

