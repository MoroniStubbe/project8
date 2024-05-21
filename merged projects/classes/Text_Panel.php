<?php

class TextPanel
{
    private $db;
    private $table;
    private $id;
    private $message;

    public function __construct($db, $table)
    {
        $this->db = $db;
        $this->table = $table;
    }

    public function create($message)
    {
        $this->message = $message;

        try {
            $this->db->create($this->table, ["message" => $this->message]);
        } catch (Exception $e) {
            throw new Exception("Failed to create message: " . $e->getMessage());
        }
    }

    public function read($id = null)
    {
        try {
            if ($id !== null || $this->id !== null) {
                if ($id !== null) {
                    $this->id = $id;
                }

                $result = $this->db->read($this->table, ["*"], ["ID" => $this->id]);
                if (count($result) > 0) {
                    $this->message = $result[0]["message"];
                    return $result[0];
                } else {
                    throw new Exception("Message with id $this->id not found.");
                }
            } else {
                return $this->db->read($this->table);
            }
        } catch (Exception $e) {
            throw new Exception("Failed to read message: " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $this->id = $id;

        try {
            $this->db->delete($this->table, ["ID" => $this->id]);
            $this->id = null;
            return true;
        } catch (Exception $e) {
            throw new Exception("Failed to delete message: " . $e->getMessage());
        }
    }
}
