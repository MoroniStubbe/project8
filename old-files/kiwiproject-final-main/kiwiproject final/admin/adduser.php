<html>
<head>
    <link rel="stylesheet" href="styleadduser.css">
</head>
<body>
<header>
    <nav class="nav">
      <ul>
        <li><a href="nieuwspanel.php">nieuws</a></li>
        <li><a href="aanvragen.php">aanvragen inzien</a></li>
        <li><a href="faqpanel.php">FAQ</a></li>
      </ul>
    </nav>
    <div class="logo">
      <img src="cropped-logo.png" alt="Company Logo">
    </div>
  </header>
    <form method="post" class="adduser">
        <p>add user</p>
        <input type="text" name="useradd">
        <input type="password" name="passwordadd">
        <input type="submit">
    </form>
    <main>
        <?php
        $db  = new PDO("mysql:host=localhost;dbname=school", "root", "");

        $query = $db->prepare("SELECT * FROM adminpanel");
        $query->execute();
        $result = $query->fetchAll();
        echo "<table class='table1'>";
        foreach($result as $data) { 
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
            $send = $db->prepare("INSERT INTO `adminpanel` (`User_name`, `Password`, `ID`) VALUES (:useradd, :passwordadd, NULL);");
            $send->bindParam(':useradd', $useradd);
            $send->bindParam(':passwordadd', $passwordadd);
            $send->execute();

           
            unset($useradd, $passwordadd);
        }

    

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}





?>
