<?php
$PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
include_once app_path('Models/database.php');
include_once app_path('Models/account.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    if (empty($name) || empty($phone) || empty($email) || empty($address) || empty($password)) {
        echo 'Vul alstublieft alle velden in';
        return false;
    } else {
        $db = new Database($PDO);
        $account = new Account($db);
        if (!$account->create($name, $phone, $email, $address, $password)) {
            echo 'Account bestaat al';
        } else {
            redirect()->route('login');
        }
    }
}
