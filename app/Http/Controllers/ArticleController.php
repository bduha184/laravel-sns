<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    public function __construct(){
        $this->authorizeResource(Article::class,'article');
    }

    public function index()
    {
        $articles = Article::latest()->get()->load(['user','tags','likes']);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {

        $allTagNames = Tag::all()->map(function($tag){
            return $tag->name;
        });
        return view('articles.create',[
            'allTagNames'=>$allTagNames,
        ]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();
        $request->tags->each(function($tagName) use ($article){
            $tag = Tag::firstOrCreate(['name'=>$tagName]);
            $article->tags()->attach($tag);
        });
        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $tags=$article->tags->map(function($tag){
            return $tag->name;
        });

        $allTagNames = Tag::all()->map(function($tag){
            return $tag->name;
        });
        return view('articles.edit',[
            'article'=>$article,
            'tags'=>$tags,
            'allTagNames' => $allTagNames,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        $article->tags()->detach();
        $request->tags->each(function($tagName) use ($article){
            $tag = Tag::firstOrCreate(['name'=>$tagName]);
            $article->tags()->attach($tag);

        });
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article){
        return view('articles.show',compact('article'));
    }

    public function like(Request $request ,Article $article){
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        return [
            'id'=>$article->id,
            'countLikes'=>$article->count_likes
        ];
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return [
            'id' => $article->id,
            'countLikes' => $article->count_likes,
        ];
    }
}
