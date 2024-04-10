<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Fancy blog!">
    <meta name="keywords" content="Blog, Ilvondir">
    <meta name="author" content="Michał Komsa (Ilvondir)">
    <title>Fancy Blog | @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://kit.fontawesome.com/d4fa1bfac0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" defer></script>
    <script src="{{ asset("js/floatingButton.js") }}" defer></script>
</head>
<body>
<div class="row">
    <div class="col s12 m3 hide-on-med-and-down orange white-text h100 valign-wrapper" style="padding: 2vw">
        <div class="right-align" style="width: 100%">
            <h1 style="margin-top: 0; font-weight: bold">Hello!</h1>
            <h4>This is my fancy blog created with <a href="https://materializecss.com" target="_blank">materialize</a>!</h4>
            <h6>My name is Michał, you can visit my social media in the floating button.</h6>
        </div>
    </div>
    <div class="col s12 m9">
         
    </div>
</div>

<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="fa-solid fa-user"></i>
    </a>
    <ul>
        <li><a class="btn-floating blue darken-1"><i class="fa-brands fa-facebook"></i></a></li>
        <li><a class="btn-floating blue"><i class="fa-brands fa-linkedin"></i></a></li>
        <li><a class="btn-floating black"><i class="fa-brands fa-github"></i></a></li>
    </ul>
</div>


</body>

</html>