<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login or Sign Up</title>
    <link rel="stylesheet" href="css/registration.css">
</head>

<body>
    <?php readfile("header.html") ?>
    <div class="container">
        <div class="login-signup">
            <h1>Het lijkt erop dat jij niet ingelogd is</h1>
            <button onclick="window.location.href='login.php'">Log In</button>
            <button onclick="window.location.href='registration.php'">Sign Up</button>
        </div>
    </div>
</body>

</html>