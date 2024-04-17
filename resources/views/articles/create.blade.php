@extends("template")

@section("title", "Write article")

@section("content")

<div class="row" style="margin-bottom: 0">
    <div class="col s12 l10 offset-l1">

        <form method="POST" action="{{ route("store.articles") }}" enctype="multipart/form-data">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        Write article
                    </div>
                        <div class='row' style="margin-bottom: 0">
                        
                            @csrf
                            <div class="input-field col s12">
                                <input id="title" type="text" class="validate" value="{{ old("title") }}" name="title">
                                <label for="title">Title</label>
                            </div>

                            <div class="input-field col s12">
                                <textarea id="content" name="content" placeholder="Start write here..." class="materialize-textarea">@if ($errors->any()) {{ old("content") }} @endif</textarea>
                                <label for="content">Content</label>
                            </div>

                            <div class="input-field col s12">
                                <div class="file-field input-field">
                                    <div class="btn blue">
                                        <span>Image</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="input-field col s12">
                                <select name="tags[]" placeholder="Select tags" multiple>
                                    <optgroup label="Tags">
                                        @foreach ($tags as $t)
                                            <option value='{{ $t->id }}'>{{ $t->name }}</option>
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