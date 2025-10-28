<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ArticleMail;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('articles/index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', [Article::class]);
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'datePublic'=>'required',
            'title'=>'required',
            'desc'=>'required'
        ]);

        $article=new Article;

        $article->title = $request->title;
        $article->datePublic = $request->datePublic;
        $article->shortDesc = $request->shortDesc;
        $article->desc = $request->desc;
        $result = $article->save();
        if ($result) Mail::to(env("MAIL_TO_ADDRESS"))->send(new ArticleMail($article));
        return redirect()->route('articles.index')->with('message','Update successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles/show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles/edit', ['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'datePublic'=>'required',
            'title'=>'required',
            'desc'=>'required'
        ]);


        $article->title = $request->title;
        $article->datePublic = $request->datePublic;
        $article->shortDesc = $request->shortDesc;
        $article->desc = $request->desc;
        $article->save();
        return redirect()->route('articles.show', ['article'=>$article->id])->with('message','Update successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('message', 'Delete successful');
    }
}
