@extends("template")

@section("title", "Register")

@section("content")

<div class="row" style="margin-bottom: 0">
    <div class="col s12 l6 offset-l3">
        <form method="POST" action="{{ route("store.users") }}">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        Register
                    </div>
                    <p>
                        <div class='row' style="margin-bottom: 0">
                        
                            @csrf
                            <div class="input-field col s12">
                                <input id="first_name" type="text" class="validate" name="first_name" value="{{ old("first_name") }}">
                                <label for="first_name">First name</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="last_name" type="text" class="validate" name="last_name" value="{{ old("last_name") }}">
                                <label for="last_name">Last name</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="login" type="text" class="validate" name="login" value="{{ old("login") }}">
                                <label for="login">Login</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" value="{{ old("email") }}">
                                <label for="email">Email</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password">
                                <label for="password">Password</label>
                            </div>

                            <div class="input-field col s12">
                                <input id="password_confirmation" type="password" class="validate" name="password_confirmation">
                                <label for="password_confirmation">Password confirmation</label>
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
                        <a href="{{ route("login") }}" class="blue-text">
                            Login
                        </a>
                    </div>
                    
                    <button type="submit" class="blue white-text waves-effect waves-light btn">
                        Register
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