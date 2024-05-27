<?php

class Account
{
    private $db;
    private $name;
    private $phone;
    private $email;
    private $address;
    private $role = "klant";
    private $password;
    private $newName;
    private $newPhoneNumber;
    private $newAddress;
    private $newEmail;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createAccount($name, $phone, $email, $address, $password)
    {
        $this->name = trim($name);
        $this->phone = trim($phone);
        $this->email = trim($email);
        $this->address = trim($address);
        $this->password = trim($password);

        try {
            $this->db->create('users', [
                'naam' => $this->name,
                'telefoonnummer' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
                'password' => $this->password,
                'role' => $this->role
            ]);

            $_SESSION['user'] = [
                'naam' => $this->name,
                'telefoonnummer' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
                'role' => $this->role
            ];

            header("Location: index.php");
            exit();
        } catch (Exception $e) {
            echo "Fout bij gebruikersregistratie";
            exit();
        }
    }

    public function loginAccount($name, $email, $password)
    {
        $this->name = trim($name);
        $this->email = trim($email);
        $this->password = trim($password);

        $user = $this->db->read('users', ['*'], ['naam' => $this->name, 'email' => $this->email, 'password' => $this->password]);

        if(!$user){
            header("Location: login.php");
            exit();
        }

        $userId = $user[0]['id'];

        $_SESSION['idvanklant'] = $userId;
        $_SESSION['user'] = $user[0];
        unset($_SESSION['user']['password']);
        if ($user[0]['role'] === 'admin') {
            $_SESSION['is_admin'] = true;
        }

        setcookie('user', session_id(), time() + (86400 * 30 * 5), "/");

        header("Location: index.php");
        exit();
    }

    public function showUser()
    {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            echo "<p><strong>Naam:</strong> {$user['naam']}</p>";
            echo "<p><strong>Telefoonnummer:</strong> {$user['telefoonnummer']}</p>";
            echo "<p><strong>Adres:</strong> {$user['address']}</p>";
            echo "<p><strong>Email:</strong> {$user['email']}</p>";
        } else {
            header("Location: login_or_signup.php");
            exit();
        }
    }

    public function changeInfo($newName, $newPhoneNumber, $newAddress, $newEmail)
    {
        $this->newName = trim($newName);
        $this->newPhoneNumber = trim($newPhoneNumber);
        $this->newAddress = trim($newAddress);
        $this->newEmail = trim($newEmail);

        if (empty($this->newName) || empty($this->newPhoneNumber) || empty($this->newAddress) || empty($this->newEmail)) {
            echo "Vul alstublieft alle velden in";
            exit();
        }

        if (!isset($_SESSION['user'])) {
            echo "Gebruiker niet ingelogd";
            exit();
        }

        $user = $_SESSION['user'];
        $userId = $user['id'];

        try {
            $this->db->update('users', [
                'naam' => $this->newName,
                'telefoonnummer' => $this->newPhoneNumber,
                'address' => $this->newAddress,
                'email' => $this->newEmail
            ], ['id' => $userId]);

            $_SESSION['user'] = [
                'id' => $userId,
                'naam' => $this->newName,
                'telefoonnummer' => $this->newPhoneNumber,
                'address' => $this->newAddress,
                'email' => $this->newEmail
            ];

            header("Location: account.php");
            exit();
        } catch (Exception $e) {
            echo "Fout bij het bijwerken van gebruikersinformatie";
            exit();
        }
    }
}
