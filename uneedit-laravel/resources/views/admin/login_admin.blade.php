<!DOCTYPE html>

<html>

<head>

    <link rel="stylesheet" href="{{ asset('css/login.css')">

</head>

<body>
    <form method="post" class="login">
        <input type="text" name="username" class="username">
        <input type="password" name="password" class="password">

        <input type="submit">
    </form>
</body>

</html>

<?php
$PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
$password = $_POST["password"];
$username = $_POST["username"];


try {
    $passworddb = $PDO->prepare("SELECT * FROM adminpanel");
    $passworddb->execute();

    $result = $passworddb->fetchAll();
    foreach ($result as $data) {
        if ($password === $data["Password"] and $username === $data["User_name"]) {
            header("location: aanvragen.php");
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}





?>