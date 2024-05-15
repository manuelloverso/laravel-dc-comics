<header>
    <nav class="container d-flex py-3 align-items-center justify-content-between">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ Vite::asset('resources/img/dc-logo.png') }}" alt=""></a>
        </div>
        <ul class="list-unstyled d-flex gap-3 align-items-center m-0 fs-5 fw-semibold">
            <li>CHARACTERS</li>
            <li>COMICS</li>
            <li>MOVIES</li>
            <li>GAMES</li>
            <li>TV</li>
        </ul>
    </nav>
    <div class="jumbotron">
        <img class="w-100" src="{{ Vite::asset('resources/img/jumbotron.jpg') }}" alt="">
    </div>
</header>
