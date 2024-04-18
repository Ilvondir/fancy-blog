<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Fancy Blog</h5>
                <p class="grey-text text-lighten-4">
                    Fancy Blog is committed to delivering thought-provoking content, meticulously curated to enlighten, entertain, and inspire. Join our journey through the mesmerizing world of IT!
                </p>
                <p>For inquiries, collaborations, or just to say hello, reach out to us at <a href="mailto:contact@fancyblog.com?subject=Hello! I'm from website!">contact@fancyblog.com</a>.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Latest</h5>
                <ul>
                    @foreach ($latest as $a)
                        <li style="margin-bottom: 8px">
                            <a class="grey-text text-lighten-3" href="{{ route("show.articles", ["article" => $a->id]) }}">{{ $a->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © {{ date("Y") }} Fancy Blog
        </div>
    </div>
</footer>