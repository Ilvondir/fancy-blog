<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Article $article)
    {
        $article->comments()->create(
            $request->validated() +
            [
                "written" => date("Y-m-d"),
                "user_id" => Auth::user()->id
            ]
        );

        return redirect()->route("show.articles", ["article" => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $article = $comment->article_id;
        $comment->delete();
        return redirect()->route("show.articles", ["article" => $article]);
    }
}