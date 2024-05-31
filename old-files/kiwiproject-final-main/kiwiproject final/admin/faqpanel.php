<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav class="nav">
      <ul>
        <li><a href="adduser.php">gebruiker toevoegen</a></li>
        <li><a href="nieuwspanel.php">nieuws</a></li>
        <li><a href="aanvragen.php">aanvragen inzien</a></li>
        
      </ul>
    </nav>
    <div class="logo">
      <img src="cropped-logo.png" alt="Company Logo">
    </div>
  </header>
    <main>
        <?php
        $db  = new PDO("mysql:host=localhost;dbname=school", "root", "");

        $query = $db->prepare("SELECT * FROM faq");
        $query->execute();
        $result = $query->fetchAll();
        echo "<table class='table1'>";
        foreach($result as $data) { 
            echo "<tr>";
            echo "<td>" . $data["post"] . "</td>"; 
            echo "<td>" . $data["ID"] . "</td>";
            echo "</tr>";       
        }
        echo "</table>";
        
        
        
        
        ?>
    </main>
    <form method="post" class="intput1">

    <input name="addfaq" type="text" placeholder="add something by entering your text and then pressing submit">
    <input type="submit" >
    </form>
    <form method="post" class="intput1">
        <input name="faqrm" type="text" placeholder="remove something by entering id and then pressing submit">
        <input type="submit">

    </form>


</body>
</html>
<?php
$db  = new PDO("mysql:host=localhost;dbname=school", "root", "");


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $faqrm = (int) $_POST["faqrm"]; 
  
    try {

      if (!empty($faqrm)) {
        $rm = $db->prepare("DELETE FROM `faq` WHERE `faq`.`ID` = :faqrm");
        $rm->bindParam(':faqrm', $faqrm, PDO::PARAM_INT);
        $rm->execute();
    }
    


    } catch(PDOException $e) {
      echo "Error deleting FAQ: " . $e->getMessage(); 
    }
  }



if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $faqadd = $_POST["addfaq"];

  try {

   
    if (!empty($faqadd)) {
      
      $send = $db->prepare("INSERT INTO `faq` (`post`) VALUES (:faqadd);");
    
      $send->bindParam(':faqadd', $faqadd);
      $send->execute();
    }

  } catch(PDOException $e) {

   
  }
}














?>