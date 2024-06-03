<?php
$PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
include_once app_path('Models/database.php');
include_once app_path('Models/account.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        echo 'Geen naam, wachtwoord of e-mailadres ingevoerd';
        return false;
    } else {
        $db = new Database($PDO);
        $account = new Account($db);
        $account->log_in($name, $email, $password);
    }
}
