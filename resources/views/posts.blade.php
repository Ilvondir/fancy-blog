@extends("template")

@section("title", "Posts")

@section("content")

<h2 style="padding: 0 0 0 1vmax">Our posts</h2>
<p class="light" style="padding: 0 0 0 1vmax">
    Dive into our latest collection of articles, each crafted with passion and meticulous attention to detail. Here, we explore a wide array of topics, delivering expert insights and innovative ideas designed to enlighten and inspire. Our commitment is to provide you with thoughtful content that not only informs but also enriches your perspective. Enjoy the read and discover the dedication behind each post.
</p>
@foreach ($posts as $p)
<div class="row" style="margin: 0">
    <div class="col s12 l10">
    <div class="card horizontal">
        <div class="card-image" style="background-image: url({{$p->image}}); width: 35%; background-position: center; background-size: cover">
        </div>
        <div class="card-stacked">
            <div class="card-content">
                <span class="card-title">{{ $p->title }}</span>
                <p style="margin-bottom: 5px">
                    @foreach ($p->tags as $t)
                        <span class="tag" style="background-color: {{ $t->color }}">{{$t->name}}</span>
                    @endforeach
                </p>
                <p>{{ substr($p->content, 0, 250) }}...</p>
            </div>
            <div class="card-action light">
                <i class="fa-calendar-days fa-regular blue-text" style="margin-right: 0.4vmax; font-size: 125%"></i>{{ $p->published }}
                <i class="fa-solid fa-user-pen blue-text" style="margin: 0 0.4vmax 0 1.5vmax; font-size: 125%"></i> {{ $p->user->login }}
            </div>
        </div>
    </div>
    </div>
</div>

@endforeach

@endsection