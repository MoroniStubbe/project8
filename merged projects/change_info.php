<?php
include_once("database.php");
include_once("./classes/database.php");
include_once("./classes/account.php");

session_start();

    $user = $_SESSION['user'];
    $newName = $_POST['newName'];
    $newPhoneNumber = $_POST['newPhoneNumber'];
    $newAddress = $_POST['newAddress'];
    $newEmail = $_POST['newEmail'];

if (empty($user) || empty($newName) || empty($newPhoneNumber) || empty($newAddress) || empty($newEmail)){
    echo "Vul alstublieft alle velden in";
    exit();
} else{
    $db = new Database($PDO);
    $account = new Account($db);
    $account->changeInfo($newName, $newPhoneNumber, $newAddress, $newEmail);
}