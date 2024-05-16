<?php

class RepairRequest
{
    private $db;
    private $id;
    private $device_type;
    private $device_name;
    private $problem;
    private $telephone;
    private $email;

    function __construct($db)
    {
        $this->db = $db;
    }

    function create($device_type, $device_name, $problem, $telephone, $email)
    {
        $this->device_type = $device_type;
        $this->device_name = $device_name;
        $this->problem = $problem;
        $this->telephone = $telephone;
        $this->email = $email;

        $this->db->create("repair_request", [
            "device_type" => $device_type,
            "device_name" => $device_name,
            "problem" => $problem,
            "telephone" => $telephone,
            "email" => $email
        ]);
    }

    function read()
    {
    }
}
