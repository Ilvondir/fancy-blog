<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articles = Article::orderBy("id", "DESC")->with(["user", "tags", "comments"])->get();

        if ($request->input("tag")) {
            $tag = $request->input("tag");

            $filtered = [];
            foreach ($articles as $a) {
                if ($a->tags->contains("name", $tag)) array_push($filtered, $a);
            }

            return view("articles.articles", ["articles" => $filtered]);
        }
        else 
            return view("articles.articles", ["articles" => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize("create", Article::class);
        return view("articles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        Gate::authorize("create", Article::class);
        $file = $request->file("image");
        $filename = Str::random(25) . ".". $file->extension();
        Storage::putFileAs("public/img", $file, $filename);
        
        $article = Article::create([
            "title" => $request->validated("title"),
            "content" => $request->validated("content"),
            "image" => "img/" . $filename,
            "user_id" => Auth::user()->id,
            "published" => date("Y-m-d")
        ]);

        return redirect()->route("show.articles", ["article" => $article->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $a = Article::with(["comments.user", "user", "tags"])->find($article->id);
        return view("articles.show", ["article" => $a]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Gate::authorize("delete", $article);
        $img = $article->image;

        if (Storage::exists("public/" . $img)) {
            Storage::delete("public/" . $img);
        }

        $article->delete();
        return redirect()->route("index.articles");
    }
}