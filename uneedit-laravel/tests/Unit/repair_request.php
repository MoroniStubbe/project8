<?php
$PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
include_once("app_path('Models/database.php");
include_once("app_path('Models/repair_request.php");


$db = new Database($PDO);
$repair_request = new RepairRequest($db);
$repair_request->create("device_type", "device_name", "problem", "telephone", "email");
$repair_request->read(199);

$a = 0;
