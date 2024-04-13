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
            <li class="collection-item">
                @foreach ($article->tags as $t)
                    <span class="tag" style="background-color: {{ $t->color }}">{{ $t->name }}</span>
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

        @foreach ($article->comments as $c)
        <div class="col s12">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <p style="font-weight: bold; margin-bottom: 1.5vmax">{{ $c->user->login }}</p>
                        <p>{{ $c->content }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>

@endsection
