@extends('template')

@section('title', ucfirst("home"))

@section("content")

<div class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h1 class="header center white-text">Welcome on our blog!</h1>
            <div class="row center">
                <h5 class="header col s12 white-text light">We are a team of passionate individuals with a deep love for
                    all things of IT and life. Join us as we explore the exciting realm of technology together!</h5>
            </div>
            <br><br>
        </div>
    </div>
    <div class="parallax">
        <img src="{{ asset("img/business.jpg")}}" style="filter: brightness(75%)" alt="Baner img.">
    </div>
</div>

<div class="container">
    <div class="section">

        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center blue-text"><i class="fa-solid fa-microchip"></i></h2>
                    <h5 class="center">Tech Triumphs</h5>

                    <p class="light">Discover how technology fuels success and positivity in everyday life. Join us for
                        uplifting stories and practical insights. Let's embrace the potential of tech together!</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center blue-text"><i class="fa-brands fa-hackerrank"></i></h2>
                    <h5 class="center">Productivity Hacks</h5>

                    <p class="light">Boost your efficiency with cutting-edge tech tips. Unleash your potential and
                        embrace a tech-savvy lifestyle. Transform the way you work and live.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center blue-text"><i class="fa-solid fa-book"></i></h2>
                    <h5 class="center">Tech Tales</h5>

                    <p class="light">Explore inspiring journeys of tech enthusiasts. Dive into motivating stories from
                        the world of IT. Be inspired by the limitless possibilities of technology.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="parallax-container valign-wrapper" style="height: 200px; justify-content: center;">
    <div class="section no-pad-bot" style="width: 100%">
        <div class="container">
            <div class="row center">
                <h4 class="header white-text center">We have knowledge about whole fields of IT!</h4>
            </div>
        </div>
    </div>

    <div class="parallax"><img src="{{ asset("img/desk.jpg") }}" alt="Desk."></div>
</div>

<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12 center">
                <h4>Our goals</h4>
                <p class="light center">
                    We specialize in delivering inspiring and accessible programming and technology education. Our
                    content is crafted for everyone, from beginners to advanced learners. Whether you're exploring the
                    basics of coding or diving into advanced topics like machine learning and cybersecurity, our goal is
                    to provide valuable resources and insights. Join our community and embark on a journey of continuous
                    learning and growth in the ever-evolving tech landscape!<br><br>
                    Currently we have {{$posts}} articles and {{$tags}} tags.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection