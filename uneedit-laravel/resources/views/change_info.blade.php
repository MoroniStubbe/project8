<?php
$PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
include_once app_path('Models/database.php');
include_once app_path('Models/account.php');

$db = new Database($PDO);
$account = new Account($db);
$account->change_info($_POST['name'], $_POST['phone'], $_POST['address'], $_POST['email']);
