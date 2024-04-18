@extends("template")

@section("title", "Edit "  . $article->title)

@section("content")

<div class="row" style="margin-bottom: 0">
    <div class="col s12 l10 offset-l1">

        <form method="POST" action="{{ route("update.articles", ["article" => $article->id]) }}" enctype="multipart/form-data">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        Edit article
                    </div>
                        <div class='row' style="margin-bottom: 0">
                        
                            @csrf
                            @method("put")
                            <div class="input-field col s12">
                                <input id="title" type="text" class="validate" value="@if ($errors->any()){{ old("title") }}@else{{ $article->title }}@endif" name="title">
                                <label for="title">Title</label>
                            </div>

                            <div class="input-field col s12">
                                <textarea id="content" name="content" placeholder="Start write here..." class="materialize-textarea">@if ($errors->any()){{ old("content") }}@else{{ $article->content }}@endif</textarea>
                                <label for="content">Content</label>
                            </div>

                            <div class="input-field col s12">
                                <div class="file-field input-field">
                                    <div class="btn blue">
                                        <span>New image</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Don't upload if you don't want to change the image.">
                                    </div>
                                </div>
                            </div>

                            <div class="input-field col s12">
                                <select name="tags[]" placeholder="Select tags" multiple>
                                    <optgroup label="Tags">
                                        @foreach ($tags as $t)
                                            @php
                                                if (!$errors->any()) {
                                                    $isInArticle = false;

                                                    foreach ($article->tags as $at) {
                                                        if ($at->id == $t->id) $isInArticle = true;
                                                    }
                                                }
                                                else {
                                                    $isInArticle = in_array($t->id, old("tags"));
                                                }
                                            @endphp

                                            <option value='{{ $t->id }}' @if ($isInArticle) selected @endif>{{ $t->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                <label>Tags</label> 
                            </div>


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
                        
                </div>
                <div class="card-action">
                    
                    <button type="submit" class="blue white-text waves-effect waves-light btn">
                        Save
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    M.FormSelect.init(elems, options);
});
</script>

@endsection