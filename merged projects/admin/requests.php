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
        <li><a href="faqpanel.php">FAQ</a></li>
      </ul>
    </nav>
    <div class="logo">
      <img src="../img/logo.png" alt="Company Logo">
    </div>
  </header>
  <main>
    <?php
    include_once("../database.php");
    include_once("../classes/database.php");
    include_once("../classes/repair_request.php");
    $db = new Database($PDO);
    $repair_request = new RepairRequest($db);
    $repair_requests = $repair_request->read();

    echo "<table class='table1'>";
    foreach ($repair_requests as $data) {
      echo "<tr>";
      echo "<td>" . $data["device_type"] . "</td>";
      echo "<td>" . $data["device_name"] . "</td>";
      echo "<td>" . $data["problem"] . "</td>";
      echo "<td>" . $data["email"] . "</td>";
      echo "<td>" . $data["telephone"] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    ?>
  </main>

</body>

</html>