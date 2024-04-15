@extends("template")

@section("title", "Tags")

@section("content")

@can('create', App\Models\Tag::class)
    
    <div class="right">
        <a href="{{ route("create.tags") }}">
            <button  style="margin: 1.4vmax 1vmax 0 0" class="btn waves-effect waves-light blue">Create new tag</button>
        </a>
    </div>

@endcan

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

        <div class="col s12 m3 center black-text">
            <a href="{{ route("index.articles")."?".$queryString }}">
                <div class="col s12">
                    <div class="card" style="background-color: {{ $tags[$i]->color }}; font-size:110%; margin-bottom: 1vmax">
                        <div class="card-content black-text">
                            <p>
                                {{ $tags[$i]->name }} ({{ count($tags[$i]->articles) }})
                            </p>
                        </div>
                    </div>
                </div>
            </a>

            @can("delete", App\Models\Tag::class)
                <div class="center" style="margin-top: 0; margin-bottom: 1.5vmax">
                    <a style="letter-spacing: 0.25vmax" class="waves-effect waves-light modal-trigger red-text" href="#delete-{{ $tags[$i]->id }}-modal">DELETE {{ strtoupper($tags[$i]->name ) }}</a>
                </div>

                <div id="delete-{{ $tags[$i]->id }}-modal" class="modal left-align">
                    <div class="modal-content">
                        <h4>Tag delete</h4>
                        <p>Are you sure you want to delete tag {{ $tags[$i]->name }}?</p>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route("destroy.tags", ["tag" => $tags[$i]->id]) }}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="red white-text waves-effect waves-light btn">
                                <i class="fa-solid fa-trash" style="font-size:110%"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endcan

        </div>

    @if ($i % 4 == 3 || $i == count($tags)-1)
        </div>
    @endif
@endfor


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        M.Modal.init(elems, {});
    });
</script>

@endsection