<header>
    <nav class="nav">
        <ul>
            <li><a href="{{ route('admin.add.user.view') }}">gebruiker toevoegen</a></li>
            <li><a href="{{ route('admin.news.panel.view') }}">nieuws</a></li>
            <li><a href="{{ route('admin.requests.view') }}">aanvragen inzien</a></li>
            <li><a href="{{ route('admin.faq.panel.view') }}">FAQ</a></li>
            <li><a href="{{ route('admin.add.product.view') }}">product toevoegen</a></li>
        </ul>
    </nav>
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="Company Logo">
    </div>
</header>