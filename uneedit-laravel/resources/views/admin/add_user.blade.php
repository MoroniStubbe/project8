<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/add_user.css') }}">
</head>

<body>
    <x-admin_nav></x-admin_nav>
    <form method="post" class="adduser">
        @csrf
        <p>add user</p>
        <input type="text" name="useradd">
        <input type="password" name="passwordadd">
        <input type="submit">
    </form>
    <main>
        <?php
        $PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
        $query = $PDO->prepare("SELECT * FROM adminpanel");
        $query->execute();
        $result = $query->fetchAll();
        echo "<table class='table1'>";
        foreach ($result as $data) {
            echo "<tr>";
            echo "<td>" . $data["User_name"] . "</td>";
            echo "<td>" . $data["Password"] . "</td>";
            echo "<td>" . $data["ID"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";




        ?>
    </main>


</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $useradd = $_POST["useradd"];
    $passwordadd = $_POST["passwordadd"];

    try {


        if (!empty($useradd) && !empty($passwordadd)) {
            $send = $PDO->prepare("INSERT INTO `adminpanel` (`User_name`, `Password`, `ID`) VALUES (:useradd, :passwordadd, NULL);");
            $send->bindParam(':useradd', $useradd);
            $send->bindParam(':passwordadd', $passwordadd);
            $send->execute();


            unset($useradd, $passwordadd);
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}





?>