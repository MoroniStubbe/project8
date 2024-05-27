<?php

class Account
{
    private $db;
    public $id;
    public $name;
    public $phone;
    public $email;
    public $address;
    public $role = "customer";
    private $password;

    public function __construct($db)
    {
        $this->db = $db;
    }

    private function to_array()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'role' => $this->role
        ];
    }

    private function from_array($account)
    {
        if (isset($account["id"])) {
            $this->id = $account["id"];
        }
        if (isset($account["name"])) {
            $this->name = $account["name"];
        }
        if (isset($account["phone"])) {
            $this->phone = $account["phone"];
        }
        if (isset($account["email"])) {
            $this->email = $account["email"];
        }
        if (isset($account["address"])) {
            $this->address = $account["address"];
        }
        if (isset($account["role"])) {
            $this->role = $account["role"];
        }
        if (isset($account["password"])) {
            $this->password = $account["password"];
        }
    }

    private function save_session()
    {
        session_start();
        $_SESSION['account'] = $this->to_array();
        return $_SESSION['account'];
    }

    public function load_session()
    {
        if (!isset($_SESSION['account'])) {
            session_start();
        }
        $this->from_array($_SESSION['account']);
    }

    public function read($cols = ['*'], $where = [])
    {
        return $this->db->read('accounts', $cols, $where);
    }

    public function create($name, $phone, $email, $address, $password)
    {
        if (
            count($this->read(where: ['name' => $name])) > 0 ||
            count($this->read(where: ['phone' => $phone])) > 0 ||
            count($this->read(where: ['email' => $email])) > 0
        ) {
            return false;
        }

        try {
            $this->db->create('accounts', [
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'address' => $address,
                'password' => $password,
                'role' => $this->role
            ]);

            $this->from_array($this->read(where: ['name' => $name, 'phone' => $phone, 'email' => $email])[0]);
            return true;
        } catch (Exception $e) {
            echo "Fout bij gebruikersregistratie";
            return false;
        }
    }

    public function log_in($name, $email, $password)
    {
        $account = $this->read(where: ['name' => $name, 'email' => $email]);

        if (!$account) {
            header("Location: login.php?error=account_not_found");
            return false;
        }

        $account = $account[0];
        $this->from_array($account);
        if ($this->password !== $password) {
            return false;
        }

        $this->save_session();

        header("Location: index.php");
    }

    public function show()
    {
        $this->load_session();
        if (isset($_SESSION['account'])) {
            echo "<p><strong>Naam:</strong> {$this->name}</p>";
            echo "<p><strong>Telefoonnummer:</strong> {$this->phone}</p>";
            echo "<p><strong>Adres:</strong> {$this->address}</p>";
            echo "<p><strong>Email:</strong> {$this->email}</p>";
        } else {
            header("Location: login_or_signup.php");
        }
    }

    public function change_info($name, $phone, $address, $email)
    {
        $this->load_session();
        if (empty($name) || empty($phone) || empty($address) || empty($email)) {
            echo "Vul alstublieft alle velden in";
            return false;
        }

        session_start();
        if (!isset($_SESSION['account'])) {
            echo "Gebruiker niet ingelogd";
            return false;
        }

        try {
            $this->db->update('accounts', [
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'email' => $email
            ], ['id' => $this->id]);

            $this->name = $name;
            $this->phone = $phone;
            $this->address = $address;
            $this->email = $email;
            $this->save_session();

            header("Location: account.php");
        } catch (Exception $e) {
            echo "Fout bij het bijwerken van gebruikersinformatie";
            return false;
        }
    }
}
