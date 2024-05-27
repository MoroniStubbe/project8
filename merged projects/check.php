<?php
include_once("database.php");
include_once("classes/database.php");
include_once("classes/account.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['naam'];
    $phone = $_POST['telefoonnummer'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    if (empty($name) || empty($phone) || empty($email) || empty($address) || empty($password)) {
        echo "Vul alstublieft alle velden in";
        exit();
    } else {
        $db = new Database($PDO);
        $account = new Account($db);
        $account->create($name, $phone, $email, $address, $password);
    };
}
