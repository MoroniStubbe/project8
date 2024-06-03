<?php
include_once("database.php");
include_once("classes/database.php");
include_once("classes/account.php");

$db = new Database($PDO);
$account = new Account($db);
$account->change_info($_POST['name'], $_POST['phone'], $_POST['address'], $_POST['email']);
