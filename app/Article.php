<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
//    protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = [];

    public function     path()
    {
//        return '/articles/';
        return route('articles.show', $this);
    }

/*    public function getRouteKeyName()
    {
        return 'slug';  // column name used to route via model binding
        // Article::where('slug', $article)->first();
    }*/

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
