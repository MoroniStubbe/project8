<?php
include_once("database.php");
include_once("./classes/database.php");
include_once("./classes/account.php");

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    if (empty($name) || empty($phone) || empty($email) || empty($address) || empty($password)) {
        echo "Vul alstublieft alle velden in";
        exit();
    } else {
        $db = new Database($PDO);
        $account = new Account($db);
        $account->createAccount($name, $phone, $email, $address, $password);
    };
}
?>