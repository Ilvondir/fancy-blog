<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("home");
});

Route::get("/home", function () {
    return view("home", ["articles" => Article::count(), "tags" => Tag::count()]);
})->name("home");


Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles', 'index')->name("index.articles");
    Route::get('/articles/{article}', 'show')->name("show.articles");
});

Route::controller(TagController::class)->group(function () {
    Route::get('/tags', 'index')->name("index.tags");
});