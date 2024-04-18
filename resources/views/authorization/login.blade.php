@extends("template")

@section('title', "Login")

@section("content")

<div class="row" style="margin-bottom: 0">
    <div class="col s12 l6 offset-l3">

        @if (request()->boolean("registered"))

            <div class="card center green-text" style="padding: 1.5vmax 0; font-size:140%">
                Now you can login.
            </div>

        @endif

        <form method="POST" action="{{ route("authenticate") }}">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        Login
                    </div>
                    <p>
                        <div class='row' style="margin-bottom: 0">
                        
                            @csrf
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email">
                                <label for="email">Email</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password">
                                <label for="password">Password</label>
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

                    <div class="right" style='margin-top: .5vmax'>
                        <a href="{{ route("register") }}" class="blue-text">
                            Register
                        </a>
                    </div>
                    
                    <button type="submit" class="blue white-text waves-effect waves-light btn">
                        Login
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>

@endsection