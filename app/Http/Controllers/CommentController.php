<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentMail;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('comments/index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Article $article)
    {
        return view('comments.create', ['article' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Article $article)
    {
        $this->authorize('create', Comment::class);
        //return $request->json_decode();
        $request->validate([
            'text'=>'min:10|required',
        ]);

        $comment = new Comment;
        $comment->text = $request->text;
        $comment->articles_id = $article->id;
        $comment->user_id = Auth::id();
        $result = $comment->save();
        if ($result) Mail::to(env("MAIL_TO_ADDRESS"))->send(new CommentMail($comment, $article->title));

        return redirect()->route('articles.show', $article)->with('message', "Comment add succesful and enter for moderation.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $comments = $article->comments()->latest()->paginate(3);
        return view('comments/show', ['article' => $article, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article, Comment $comment)
    {
        $this->authorize('update', $comment);
        return view('comments/edit', ['article'=>$article, 'comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article, Comment $comment)
    {
        $this->authorize('update', $comment);
        $request->validate([
            'text'=>'min:10|required',
        ]);

        $comment->text = $request->text;
        $comment->save();

        return redirect()->route('articles.show', $article)->with('message', "Comment update succesful");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('articles.show', $article)->with('message', 'Delete successful');
    }

    public function accept(Comment $comment){
        $comment->accept = true;
        $comment->save();
        $article = Article::FindOrFail($comment->articles_id);
        return redirect()->route('articles.show', $article)->with('message', 'Accept successful');
    }
    public function reject(Comment $comment){
        $comment->accept = false;
        $comment->save();
        $article = Article::FindOrFail($comment->articles_id);
        return redirect()->route('articles.show', $article)->with('message', 'Reject successful');
    }
}
