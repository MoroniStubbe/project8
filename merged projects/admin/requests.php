<html>

<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <nav class="nav">
      <ul>
        <li><a href="add_user.php">gebruiker toevoegen</a></li>
        <li><a href="news_panel.php">nieuws</a></li>
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
    $join = $PDO->prepare("SELECT reparatie_aanvraag.*, contact_info.* FROM reparatie_aanvraag INNER JOIN contact_info ON reparatie_aanvraag.contact_ID = contact_info.ID;");
    $join->execute();
    $result1 = $join->fetchAll();

    echo "<table class='table1'>";
    foreach ($result1 as $data) {
      echo "<tr>";
      echo "<td>" . $data["device_type"] . "</td>";
      echo "<td>" . $data["computer_naam"] . "</td>";
      echo "<td>" . $data["probleem"] . "</td>";
      echo "<td>" . $data["contact_ID"] . "</td>";
      echo "<td>" . $data["email"] . "</td>";
      echo "<td>" . $data["telefoon_nummer"] . "</td>";
      echo "</tr>";
    }
    echo "</table>";





    ?>
  </main>


</body>

</html>