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
        <li><a href="requests.php">aanvragen inzien</a></li>
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
      include_once("../classes/Text_Panel.php");

      try {
          $db = new Database($PDO);
          $textPanel = new TextPanel($db, 'faq');

          if ($_SERVER["REQUEST_METHOD"] === "POST") {
              if (isset($_POST["addnew"]) && !empty(trim($_POST["addnew"]))) {
                  $textPanel->create(trim($_POST["addnew"]));
                  echo "Message added successfully.";
              }

              if (isset($_POST["rmnew"]) && !empty(trim($_POST["rmnew"]))) {
                  $idToDelete = (int)trim($_POST["rmnew"]);
                  if ($textPanel->delete($idToDelete)) {
                      echo "Message with ID $idToDelete deleted successfully.";
                  } else {
                      echo "Failed to delete message with ID $idToDelete.";
                  }
              }
          }
          $result = $textPanel->read();
          echo "<table class='table1'>";
          foreach ($result as $data) {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($data["message"]) . "</td>";
              echo "<td>" . htmlspecialchars($data["ID"]) . "</td>";
              echo "</tr>";
          }
          echo "</table>";
      } catch (Exception $e) {
          echo "Error: " . $e->getMessage();
      }
      ?>
  </main>
  <form method="post" class="input1">
      <input name="addnew" type="text" placeholder="Add something by entering your text and then pressing submit">
      <input type="submit">
  </form>
  <form method="post" class="input1">
      <input name="rmnew" type="text" placeholder="Remove something by entering id and then pressing submit">
      <input type="submit">
  </form>
</body>
</html>
