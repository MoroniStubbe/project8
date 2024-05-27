<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <?php readfile("header.html") ?>
    <main class="main-content">
        <div class="form-container">
            <h2 class="form-title">Login</h2>
            <form id="registration-form" action="auth.php" method="post">
                <input type="text" class="" name="Name" id="Name" placeholder="Name"><br>
                <input type="text" class="" name="email" id="email" placeholder="Email"><br>
                <input type="password" class="" name="password" id="password" placeholder="Password"><br>
                <button type="submit">Log in</button>
            </form>
        </div>
    </main>
    <?php readfile("footer.html") ?>
</body>

</html>