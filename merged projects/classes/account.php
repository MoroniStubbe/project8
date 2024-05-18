<?php
class Account {
    public function createAccount(){
        include_once ("database.php");

        $naam = filter_var(trim($_POST['naam']), FILTER_SANITIZE_STRING);
        $telefoonnummer = filter_var(trim($_POST['telefoonnummer']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

        $stmt = $PDO->prepare("INSERT INTO `users` (`naam`, `telefoonnummer`, `email`, `address`, `password`, `role`) VALUES (:naam, :telefoonnummer, :email, :address, :password, 'klant')");
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':telefoonnummer', $telefoonnummer);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $user = [
                'naam' => $naam,
                'telefoonnummer' => $telefoonnummer,
                'email' => $email,
                'address' => $address,
                'password' => $password
            ];
        
            $_SESSION['user'] = $user;
        
            header("Location: index.html");
            exit();
        } else {
            echo "Fout bij gebruikersregistratie";
            exit();
        }        
    }

    public function users(){
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
};
?>