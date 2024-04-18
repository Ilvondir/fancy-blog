<nav class="nav-extended blue" style="box-shadow: none">
    <div class="nav-wrapper">
      <a href="{{ route("home") }}" class="brand-logo center">Fancy Blog</a>
    </div>
    <div class="nav-content">
        <ul class="tabs tabs-transparent">

            <li class="tab @if ( str_contains(request()->path(), "home") ) active @endif"><a href="{{ route("home") }}" class="@if ( str_contains(request()->path(), "home") ) active @endif">
                <i class="fa-solid fa-house" style="font-size: 120%; margin-right: 3px"></i> Home</a>
            </li>

            <li class="tab @if ( request()->path() == "articles" ) active @endif"><a href="{{ route("index.articles") }}" class="@if ( request()->path() == "articles" ) active @endif">
                <i class="fa-solid fa-newspaper" style="font-size: 120%; margin-right: 3px"></i> Articles</a>
            </li>

            @can("create", App\Models\Article::class)

                <li class="tab @if ( str_contains(request()->path(), "articles/create") ) active @endif"><a href="{{ route("create.articles") }}" class="@if ( str_contains(request()->path(), "articles/create") ) active @endif">
                    <i class="fa-solid fa-pen-nib" style="font-size: 120%; margin-right: 3px"></i> Write article</a>
                </li>

            @endcan

            <li class="tab @if ( str_contains(request()->path(), "tags") ) active @endif"><a href="{{ route("index.tags") }}" class="@if ( str_contains(request()->path(), "tags") ) active @endif">
                <i class="fa-solid fa-hashtag" style="font-size: 120%; margin-right: 3px"></i> Tags</a>
            </li>

        @if (!Auth::check())
            <li class="tab @if ( str_contains(request()->path(), "login") || str_contains(request()->path(), "register") ) active @endif"><a href="{{ route("login") }}" class="@if ( str_contains(request()->path(), "login")  || str_contains(request()->path(), "register") ) active @endif">
                <i class="fa-solid fa-door-open" style="font-size: 120%; margin-right: 3px"></i> Login</a>
            </li>

        @else
            <li class="tab">
                <a href="#" id="logout">
                    <i class="fa-solid fa-door-open" style="font-size: 120%; margin-right: 3px"></i>

                    @php 
                        $string = "";
                        if (Auth::user()->first_name) $string .= Auth::user()->first_name;
                        if (Auth::user()->last_name) $string .= " " . Auth::user()->last_name;
                        if (Auth::user()->first_name || Auth::user()->last_name) $string .= ",";

                    @endphp

                    {{$string}} Logout
                </a>
            </li>

            <script>

                const a = document.querySelector("#logout");

                a.addEventListener("click", logout, false);

                function logout(event) {
                    event.preventDefault();
                        
                    let url = '{{ route('logout') }}';
                    let csrfToken = "{{ csrf_token() }}";
                        
                    let form = document.createElement('form');
                    form.setAttribute('method', 'POST');
                    form.setAttribute('action', url);
                        
                    let csrfInput = document.createElement('input');
                    csrfInput.setAttribute('type', 'hidden');
                    csrfInput.setAttribute('name', '_token');
                    csrfInput.setAttribute('value', csrfToken);
                        
                    form.appendChild(csrfInput);
                    document.body.appendChild(form);
                        
                    form.submit();
                }
            </script>
        @endif

      </ul>
    </div>
    
  </nav>