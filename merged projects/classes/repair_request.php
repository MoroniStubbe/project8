<?php

class RepairRequest
{
    private $db;
    private $table = "repair_request";
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

        $this->db->create($this->table, [
            "device_type" => $device_type,
            "device_name" => $device_name,
            "problem" => $problem,
            "telephone" => $telephone,
            "email" => $email
        ]);
    }

    function read($id = null)
    {
        if (!$id) {
            if (!$this->id) {
                return "no id provided";
            }

            $id = $this->$id;
        } else {
            $this->id = $id;
        }

        $result = $this->db->read($this->table, where: ["id" => $id])[0];

        if (gettype($result) == "string") {
            return $result;
        }

        $this->device_type = $result["device_type"];
        $this->device_name = $result["device_name"];
        $this->problem = $result["problem"];
        $this->telephone = $result["telephone"];
        $this->email = $result["email"];
    }
}
