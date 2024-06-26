@extends("template")

@section("title", $article->title)

@section("content")

@php
    if (str_starts_with($article->image, "https")) $img = $article->image;
    else {
        $img = asset("storage/" . $article->image);
    }
@endphp

<div style="background-image: url({{ $img }}); height: 500px; background-position: center; background-size: cover"></div>


<div class="row" style="padding: 0 3vmax">

    <h2>{{ $article->title }}</h2>
    <div class="col s12 l9">

        <p style="font-size: 110%; white-space: pre-wrap">{{ $article->content }}</p>

    </div>

    <div class="col s12 l3">
        <ul class="collection">
            <li class="collection-item" style="line-height: 1.8rem">
                @foreach ($article->tags as $t)
                    @php
                        $qs = http_build_query(["tag" => $t->name])
                    @endphp
                    <a class="black-text center" href="{{ route("index.articles")."?".$qs }}">
                    <span class="tag center" style="white-space: nowrap; background-color: {{ $t->color }}; margin-right: 0.3vmax">{{$t->name}}</span>
                </a>
                @endforeach
            </li>

            <li class="collection-item">
                <i class="fa-solid fa-user-pen blue-text" style="margin-right: 0.5vmax font-size: 125%"></i> {{ $article->user->login }}
            </li>

            <li class="collection-item">
                <i class="fa-calendar-days fa-regular blue-text" style="margin-right: 0.5vmax; font-size: 125%"></i>{{ $article->published }}
            </li>

            @can("update", $article)
                <li class="collection-item">
                    <a href="{{ route("edit.articles", ["article" => $article->id]) }}">
                        <i class="fa-solid fa-pen-to-square blue-text" style="margin-right: 0.5vmax; font-size: 125%"></i>
                        Edit
                    </a>
                </li>
            @endcan

            @can("delete", $article)
                <li class="collection-item red white-text">
                    <a href="#delete-article-modal" class='white-text modal-trigger'>
                        <i class="fa-solid fa-trash white-text" style="margin-right: 0.5vmax; font-size: 125%"></i>
                        Delete
                    </a>
                </li>

                <div id="delete-article-modal" class="modal left-align">
                    <div class="modal-content">
                        <h4>Article delete</h4>
                        <p>Are you sure you want to delete article "<strong>{{ $article->title }}</strong>"?</p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route("destroy.articles", ["article" => $article->id]) }}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="red white-text waves-effect waves-light btn">
                                <i class="fa-solid fa-trash" style="font-size:110%"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endcan
            
          </ul>
    </div>

</div>

<div class="row" style="padding: 0 3vmax">
    <div class="col s12">
        <h5>Comments ({{ count($article->comments) }})</h5>
        
        <div class="row">
            <div class="col s12">

                @can("create", App\Models\Comment::class)

                    <form method="POST" action="{{ route("store.comments", ["article" => $article->id]) }}">

                        <div class="row right-align">
                            @csrf
                            <div class="input-field col s12">
                                <textarea id="content" name="content" class="materialize-textarea" rows="5">@if ($errors->any()){{ old("content") }}@endif</textarea>
                                <label for="content">Comment</label>
                            </div>

                        
                            <button type="submit" class="blue white-text waves-effect waves-light btn">
                                Add
                            </button>
                        </div>

                        @if ($errors->any())
                            <div>
                                <ul class="collection red-text">
                                    @foreach ($errors->all() as $error)
                                        <li class="collection-item">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                    </form>

                @else

                    <h6><a href="{{ route("login") }}">Login</a> to add comments.</h6>

                @endcan
                    
            </div>
        </div>

        @foreach ($article->comments->reverse() as $c)
        <div class="col s12">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">

                        @can('delete', $c)
                            <div class="right">
                                <a style="letter-spacing: 0.25vmax" class="waves-effect waves-light modal-trigger red-text" href="#delete-{{$c->id}}-modal">DELETE</a>
                            </div>

                            <div id="delete-{{$c->id}}-modal" class="modal">
                                <div class="modal-content">
                                    <h4>Comment delete</h4>
                                    <p>Are you sure you want to delete this comment?</p>
                                </div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route("destroy.comments", ["comment" => $c->id]) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="red white-text waves-effect waves-light btn">
                                            <i class="fa-solid fa-trash" style="font-size:110%"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                                              

                        <p style="font-weight: bold">{{ $c->user->login }}</p>
                        <p style="margin-bottom: 1.1vmax" class="light">{{ date('d.m.Y', strtotime($c->written)) }}</p>
                        <p style="white-space: pre-wrap">{{ $c->content }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        M.Modal.init(elems, {});
    });
</script>

@endsection
