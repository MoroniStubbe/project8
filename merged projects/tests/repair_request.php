<?php


include_once("../database.php");
include_once("../classes/database.php");
include_once("../classes/repair_request.php");


$db = new Database($PDO);
$repair_request = new RepairRequest($db);
$repair_request->create("device_type", "device_name", "problem", "telephone", "email");
