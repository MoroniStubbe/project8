<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login or Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login_or_signup.css') }}">
</head>

<body>
    <x-header></x-header>
    <main>
        <div class="container">
            <div class="login-signup">
                <h1>Het lijkt erop dat jij niet ingelogd is</h1>
                <div>
                    <button onclick="window.location.href='login'">Log In</button>
                    <button onclick="window.location.href='registration'">Sign Up</button>
                </div>
            </div>
        </div>
    </main>
    <x-footer></x-footer>
</body>

</html>