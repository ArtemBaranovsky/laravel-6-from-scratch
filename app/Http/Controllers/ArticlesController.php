<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }
        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store()
    {
        $this->validateArticle();
        //        dd(request()->all());
//        $article = new Article($this->validateArticle());
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;  // auth()->id();
        $article->save();
        if (request('tags')) {}
        if (request()->has('tags')) {
            $article->tags()->attach(request('tags'));
        }
//        auth()->user()->articles()->create($article); // after adding auth
//        Article::create($this->validateArticle());
        return redirect(route('articles.index'));
//        return redirect('/articles');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {
        $article->update($this->validateArticle());
//        return redirect(route('articles.show', $article));
        return redirect($article->path());
//        return redirect('/articles/' . $article->id);
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
            'body' => 'required',
            'tags' => 'exists:tags,id'     // validation rule - exists on the 'tags' table, column 'id'
        ]);
    }
}

