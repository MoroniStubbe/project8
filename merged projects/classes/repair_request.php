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
        if ($id || $this->id) {
            if ($id) {
                $this->id = $id;
            }

            $result = $this->db->read($this->table, where: ["id" => $this->id])[0];
            $this->device_type = $result["device_type"];
            $this->device_name = $result["device_name"];
            $this->problem = $result["problem"];
            $this->telephone = $result["telephone"];
            $this->email = $result["email"];
        } else {
            $result = $this->db->read($this->table);
        }

        return $result;
    }
}
