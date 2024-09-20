<header>
    <nav class="nav">
        <img src="{{ asset('img/logo.png') }}" alt="Company Logo" class="logo">
        <ul>
            <li><a href="{{ route('admin.add.user.view') }}">gebruiker toevoegen</a></li>
            <li><a href="{{ route('admin.news.panel.view') }}">nieuws</a></li>
            <li><a href="{{ route('admin.requests.view') }}">aanvragen inzien</a></li>
            <li><a href="{{ route('admin.faq.panel.view') }}">FAQ</a></li>
            <li><a href="{{ route('admin.add.product.view') }}">product toevoegen</a></li>
        </ul>
    </nav>
</header>