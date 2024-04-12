<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("home");
});

Route::get("/home", function () {
    return view("home", ["posts" => Article::count(), "tags" => Tag::count()]);
})->name("home");

Route::get("/posts", [ArticleController::class, "index"])->name("index.posts");