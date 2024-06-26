<?php
include_once("database.php");
include_once("classes/database.php");
include_once("classes/account.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        echo "Geen naam, wachtwoord of e-mailadres ingevoerd";
        return false;
    } else {
        $db = new Database($PDO);
        $account = new Account($db);
        $account->log_in($name, $email, $password);
    };
}
