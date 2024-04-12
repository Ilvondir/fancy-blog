<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("home");
});

Route::get("/home", function () {
    return view("home", ["articles" => Article::count(), "tags" => Tag::count()]);
})->name("home");

Route::get("/articles", [ArticleController::class, "index"])->name("index.articles");
Route::get("/articles/{article}", [ArticleController::class, "show"])->name("show.articles");