<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("posts", ["posts" => Article::orderBy("published", "DESC")->with(["user", "tags"])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $post)
    {
        //
    }
}