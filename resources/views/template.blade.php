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
    <script src="{{ asset("js/parallax.js") }}" defer></script> 
</head>

<body>
<div class="row" style="margin: 0">
    <div class="col hide-on-med-and-down l3 orange white-text h100 valign-wrapper fixed" style="padding: 2vw; box-sizing: border-box">
        <div class="right-align" style="width: 100%">
            <h1 style="margin-top: 0">Hello!</h1>
            <h4 class="light">This is my fancy blog created with <a href="https://materializecss.com" target="_blank">materialize</a>!</h4>
            <h6 class="light">My name is Michał, you can visit my social media in the floating button.</h6>
        </div>
    </div>
    <div class="col s12 l9 offset-l3 main" style="padding: 0; overflow-x: hidden" >

        @include("components/navbar")

        <main>
            @yield("content")

            @include("components/footer")
        </main>
    </div>
</div>

@include("components/floatingButton")

</body>
</html>