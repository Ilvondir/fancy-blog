@extends("template")

@section("title", "Tags")

@section("content")

<h2 style="padding: 0 0 0 1vmax">Tags</h2>
<p class="light" style="padding: 0 0 0 1vmax">
    Explore our curated selection of tags, each serving as a gateway to a realm of specialized content. From cutting-edge technology to timeless lifestyle tips, our tags are thoughtfully arranged to help you navigate through our diverse articles. Whether you're seeking knowledge, inspiration, or practical advice, our tags connect you to the stories that matter most to you. Dive into topics you are passionate about and discover the depth of information that awaits. Happy exploring!
</p>
@for ($i=0; $i < count($tags); $i++)
    @if ($i % 4 == 0)
        <div class="row" style="margin: 0">
    @endif

    @php
        $queryString = http_build_query(["tag" => $tags[$i]->name])
    @endphp

    <a href="{{ route("index.articles")."?".$queryString }}">
        <div class="col s12 m3 center black-text">
            <div class="col s12">
                <div class="card" style="background-color: {{ $tags[$i]->color }}; font-size:110%">
                    <div class="card-content">
                        <p>
                            {{ $tags[$i]->name }} ({{ count($tags[$i]->articles) }})
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </a>

    @if ($i % 4 == 3 || $i == count($tags)-1)
        </div>
    @endif
@endfor

@endsection