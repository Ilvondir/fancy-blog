@extends("template")

@section("title", $article->title)

@section("content")

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    M.Modal.init(elems, {});
});
</script>

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

                        @auth
                            @if (Auth::user()->id == $c->user_id)
                                <div class="right">
                                    <a style="letter-spacing: 0.25vmax" class="waves-effect waves-light modal-trigger red-text" href="#delete-modal">DELETE</a>
                                </div>

                                <div id="delete-modal" class="modal">
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
                            @endif
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

@endsection
