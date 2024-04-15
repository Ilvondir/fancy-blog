<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("tags.tags", ["tags" => Tag::with(["articles"])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize("create", Tag::class);
        return view("tags.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        Gate::authorize("create", Tag::class);
        
        Tag::create($request->validated());

        return redirect()->route("index.tags");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        Gate::authorize("delete", Tag::class);
        $tag->delete();
        
        return redirect()->route("index.tags");
    }
}