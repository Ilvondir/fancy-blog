<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route("home");
});

Route::get("/home", function () {
    return view("home");
})->name("home");