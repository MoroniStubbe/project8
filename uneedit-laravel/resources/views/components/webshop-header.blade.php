<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<header>
    <div id="nav-container">
        <div id="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}" alt="UNEED-IT Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="{{route('webshop')}}">Webshop</a></li>
                <li><a href="{{route('webshop')}}">Karretje</a>
                <li><a href="{{route('login_or_signup')}}">Account</a>
            </ul>
        </nav>
    </div>
</header>