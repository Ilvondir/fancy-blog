<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("home");
});

Route::get("/home", function () {
    return view("home", ["posts" => Post::count(), "tags" => Tag::count()]);
})->name("home");

Route::get("/posts", [PostController::class, "index"])->name("index.posts");