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
      <img src="cropped-logo.png" alt="Company Logo">
    </div>
  </header>
    <main>
        <?php
        $db  = new PDO("mysql:host=localhost;dbname=school", "root", "");
        $join = $db->prepare("SELECT reparatie_aanvraag.*, contact_info.* FROM reparatie_aanvraag INNER JOIN contact_info ON reparatie_aanvraag.contact_ID = contact_info.ID;");
        $join->execute();
        $result1 = $join->fetchAll();

        echo "<table class='table1'>";
        foreach($result1 as $data) { 
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