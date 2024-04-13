@extends("template")

@section("title", $article->title)

@section("content")

<div style="background-image: url({{ $article->image }}); height: 500px; background-position: center"></div>


<div class="row" style="padding: 0 3vmax">

    <h2>{{ $article->title }}</h2>
    <div class="col s12 l9">

        <p style="font-size: 110%">
            {{ $article->content }}
        </p>

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
            
          </ul>
    </div>

</div>

<div class="row" style="padding: 0 3vmax">
    <div class="col s12">
        <h5>Comments ({{ count($article->comments) }})</h5>
        
        <div class="row">
            <div class="col s12">
                @guest
                    <h6><a href="{{ route("login") }}">Login</a> to add comments.</h6>
                @endguest

                @auth
                    
                    <form method="POST" action="{{ route("store.comments", ["article" => $article->id]) }}">

                        <div class="row right-align">
                            @csrf
                            <div class="input-field col s12">
                                  <textarea id="content" name="content" class="materialize-textarea" rows="5"></textarea>
                                  <label for="content">Comment</label>
                            </div>

                            <button type="submit" class="blue white-text waves-effect waves-light btn">
                                Add
                            </button>
                        </div>
                        
                    </form>

                @endauth
            </div>
        </div>

        @foreach ($article->comments->reverse() as $c)
        <div class="col s12">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <p style="font-weight: bold">{{ $c->user->login }}</p>
                        <p style="margin-bottom: 1.1vmax" class="light">{{ date('d.m.Y', strtotime($c->written)) }}</p>
                        <p>{{ $c->content }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>

@endsection
