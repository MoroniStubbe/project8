<?php

class Account
{
    private $db;
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
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'role' => $this->role
        ];
    }

    private function from_array($account)
    {
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

    private function create_session()
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

    public function create($name, $phone, $email, $address, $password)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->password = $password;

        try {
            $this->db->create('accounts', [
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
                'password' => $this->password,
                'role' => $this->role
            ]);

            header("Location: index.php");
            exit();
        } catch (Exception $e) {
            echo "Fout bij gebruikersregistratie";
            exit();
        }
    }

    public function log_in($name, $email, $password)
    {
        $account = $this->db->read('accounts', ['*'], ['name' => $name, 'email' => $email]);

        if (!$account) {
            header("Location: login.php?error=account_not_found");
            exit();
        }

        $account = $account[0];
        $this->from_array($account);
        if ($account->password === $password) {
            return false;
        }

        $this->create_session();

        header("Location: index.php");
        exit();
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
            exit();
        }
    }

    public function change_info($name, $phone, $address, $email)
    {
        if (empty($name) || empty($phone) || empty($address) || empty($email)) {
            echo "Vul alstublieft alle velden in";
            exit();
        }

        session_start();
        if (!isset($_SESSION['account'])) {
            echo "Gebruiker niet ingelogd";
            exit();
        }

        $account = $_SESSION['account'];

        try {
            $this->db->update('accounts', [
                'name' => $name,
                'phone' => $phone,
                'address' => $address,
                'email' => $email
            ], ['id' => $account->id]);


            header("Location: account.php");
            exit();
        } catch (Exception $e) {
            echo "Fout bij het bijwerken van gebruikersinformatie";
            exit();
        }
    }
}
