<header>
    <nav class="nav">
        <img src="{{ asset('img/logo.png') }}" alt="Company Logo" class="logo">
        <ul>
            <li><a href="{{ route('admin.add.user.view') }}">gebruikers</a></li>
            <li><a href="{{ route('admin.requests.view') }}">reparaties</a></li>
            <li><a href="{{ route('admin.orders.view') }}">bestellingen</a></li>
            <li><a href="{{ route('admin.products.view') }}">producten</a></li>
            <li><a href="{{ route('admin.news.view') }}">nieuws</a></li>
            <li><a href="{{ route('admin.faq.panel.view') }}">FAQ</a></li>
        </ul>
    </nav>
</header>