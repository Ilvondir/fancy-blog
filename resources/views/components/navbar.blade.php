<nav class="nav-extended blue" style="box-shadow: none">
    <div class="nav-wrapper">
      <a href="{{ route("home") }}" class="brand-logo center">Fancy Blog</a>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">

        <li class="tab @if ( str_contains(request()->path(), "home") ) active @endif"><a href="{{ route("home") }}" class="@if ( str_contains(request()->path(), "home") ) active @endif">Home</a></li>

        <li class="tab @if ( str_contains(request()->path(), "posts") ) active @endif"><a href="#" class="@if ( str_contains(request()->path(), "posts") ) active @endif">Posts</a></li>

        <li class="tab @if ( str_contains(request()->path(), "tags") ) active @endif"><a href="#" class="@if ( str_contains(request()->path(), "tags") ) active @endif">Tags</a></li>

        <li class="tab @if ( str_contains(request()->path(), "login") || str_contains(request()->path(), "register") ) active @endif"><a href="#" class="@if ( str_contains(request()->path(), "login")  || str_contains(request()->path(), "register") ) active @endif">Login</a></li>
      </ul>
    </div>
    
  </nav>