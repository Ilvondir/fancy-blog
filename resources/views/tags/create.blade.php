@extends("template")

@section("title", "Create tag")

@section("content")

<div class="row" style="margin-bottom: 0">
    <div class="col s12 l6 offset-l3">
        <form method="POST" action="{{ route("store.tags") }}">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        Create new tag
                    </div>
                    <p>
                        <div class='row' style="margin-bottom: 0">
                        
                            @csrf
                            <div class="input-field col s12">
                                <input id="name" type="text" class="validate" name="name">
                                <label for="name">Name</label>
                            </div>

                            <div class="col s12">
                                <label for="color">Color</label><br>
                                <input id="color" type="color" class="validate col s12 white" style="border: 0; height: 5vmax" name="color">
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
                        
                    </p>
                </div>
                <div class="card-action">
                    
                    <button type="submit" class="blue white-text waves-effect waves-light btn">
                        Create
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection