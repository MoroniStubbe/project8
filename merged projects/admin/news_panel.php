<html>

<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <nav class="nav">
      <ul>
        <li><a href="add_user.php">gebruiker toevoegen</a></li>
        <li><a href="requests.php">aanvragen inzien</a></li>
        <li><a href="faq_panel.php">FAQ</a></li>
      </ul>
    </nav>
    <div class="logo">
      <img src="../img/logo.png" alt="Company Logo">
    </div>
  </header>
  <main>
    <?php
    include_once("../database.php");

    try {
      $query = $PDO->prepare("SELECT * FROM news");
      $query->execute();
      $result = $query->fetchAll();
      echo "<table class='table1'>";
      foreach ($result as $data) {
        echo "<tr>";
        echo "<td>" . $data["message"] . "</td>";
        echo "<td>" . $data["ID"] . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    } catch (PDOException $e) {
      echo "Error deleting FAQ: " . $e->getMessage();
    }



    ?>
  </main>
  <form method="post" class="intput1">

    <input name="addnew" type="text" placeholder="add something by entering your text and then pressing submit">
    <input type="submit">
  </form>
  <form method="post" class="intput1">
    <input name="rmnew" type="text" placeholder="remove something by entering id and then pressing submit">
    <input type="submit">

  </form>


</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $newrm = (int) $_POST["rmnew"]; // Cast to integer for safety (optional)

  try {
    // Check if the submitted value is not empty
    if (!empty($newrm)) {
      $rm = $PDO->prepare("DELETE FROM `news` WHERE `nieuws`.`ID` = :rmnew");
      $rm->bindParam(':rmnew', $newrm, PDO::PARAM_INT);
      $rm->execute();
    }
  } catch (PDOException $e) {
    echo "Error deleting FAQ: " . $e->getMessage(); // More specific error message
  }
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $addnew = $_POST["addnew"];

  try {

    // Check if the submitted value is not empty
    if (!empty($addnew)) {

      $send = $PDO->prepare("INSERT INTO `news` (`message`) VALUES (:addnieuws);");

      $send->bindParam(':addnieuws', $addnew);
      $send->execute();
    }
  } catch (PDOException $e) {
  }
}
?>