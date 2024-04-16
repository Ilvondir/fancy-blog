<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get("/login", "login")->name("login");
    Route::post("/login",  "authenticate")->name("authenticate");
    Route::post("/logout", "logout")->name("logout");
    Route::get("/register", "register")->name("register");
    Route::post("/register", "store")->name("store.users");
});

Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles', 'index')->name("index.articles");
    Route::get('/articles/{article}', 'show')->name("show.articles");
    Route::delete('/articles/{article}', 'destroy')->name("destroy.articles");
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/articles/{article}/comments', 'store')->name("store.comments");
    Route::delete('comments/{comment}', 'destroy')->name("destroy.comments");
});

Route::controller(TagController::class)->group(function () {
    Route::get('/tags', 'index')->name("index.tags");
    Route::get('/tags/create', "create")->name("create.tags");
    Route::post('/tags/create', "store")->name("store.tags");
    Route::delete("/tags/{tag}", "destroy")->name("destroy.tags");
});