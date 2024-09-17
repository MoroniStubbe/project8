<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<header>
    <div id="nav-container">
        <div id="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('img/logo.png') }}" alt="UNEED-IT Logo"></a>
        </div>
        <nav>
            <ul>
                <li><a href="{{route('about')}}">About</a></li>
                <li><a href="{{route('news')}}">Nieuws</a></li>
                <li><a href="{{route('service')}}">Service </a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{route('request.view')}}">Aanvraag</a></li>
                <li><a href="{{route('faq')}}">FAQ</a></li>
                <li><a href="{{route('delivery_services')}}">Bezorgdiensten</a></li>
                <li><a href="{{route('login_or_signup')}}">Account</a>
            </ul>
        </nav>
    </div>
</header>