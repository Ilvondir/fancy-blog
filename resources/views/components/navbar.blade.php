<nav class="nav-extended blue" style="box-shadow: none">
    <div class="nav-wrapper">
      <a href="{{ route("home") }}" class="brand-logo center">Fancy Blog</a>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">

        <li class="tab @if ( str_contains(request()->path(), "home") ) active @endif"><a href="{{ route("home") }}" class="@if ( str_contains(request()->path(), "home") ) active @endif"><i class="fa-solid fa-house" style="font-size: 120%; margin-right: 3px"></i> Home</a></li>

        <li class="tab @if ( str_contains(request()->path(), "articles") ) active @endif"><a href="{{ route("index.articles") }}" class="@if ( str_contains(request()->path(), "articles") ) active @endif"><i class="fa-solid fa-newspaper" style="font-size: 120%; margin-right: 3px"></i> Articles</a></li>

        <li class="tab @if ( str_contains(request()->path(), "tags") ) active @endif"><a href="#" class="@if ( str_contains(request()->path(), "tags") ) active @endif"><i class="fa-solid fa-hashtag" style="font-size: 120%; margin-right: 3px"></i> Tags</a></li>

        <li class="tab @if ( str_contains(request()->path(), "login") || str_contains(request()->path(), "register") ) active @endif"><a href="#" class="@if ( str_contains(request()->path(), "login")  || str_contains(request()->path(), "register") ) active @endif"><i class="fa-solid fa-door-open" style="font-size: 120%; margin-right: 3px"></i> Login</a></li>
      </ul>
    </div>
    
  </nav>