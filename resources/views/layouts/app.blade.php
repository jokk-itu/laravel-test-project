<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Example App</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/normalize.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit-icons.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('/js/instrument.js') }}"></script>
</head>
<body>
<header>
    <nav class="uk-navbar-container uk-margin" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="/">Logo</a>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/instrument">Instruments</a></li>
                <form onsubmit="searchInstrument(event)" id="search-instrument-form" class="uk-search uk-search-default" method="get">
                    @csrf
                    <input id="search-instrument" class="uk-search-input nav-search" type="search" placeholder="Search">
                </form>
            </ul>
        </div>
    </nav>
</header>

@yield('content')

<footer>

</footer>
</body>
</html>
