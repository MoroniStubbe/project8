<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/admin_panel.css') }}">
  <title>Text Panel</title>
</head>

<body>
  <header>
    <nav class="nav">
      <ul>
        <li><a href="add_user">gebruiker toevoegen</a></li>
        <li><a href="requests">aanvragen inzien</a></li>
        <li><a href="faq_panel">FAQ</a></li>
      </ul>
    </nav>
    <div class="logo">
      <img src="../img/logo.png" alt="Company Logo">
    </div>
  </header>
  <main>
    <?php
    $PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
    include_once app_path('Models/database.php');
    include_once app_path('Models/text_panel.php');

    try {
      $db = new Database($PDO);
      $textPanel = new TextPanel($db, 'news');

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
  @csrf
    <input name="addnew" type="text" placeholder="Add something by entering your text and then pressing submit">
    <input type="submit">
  </form>
  <form method="post" class="input1">
  @csrf
    <input name="rmnew" type="text" placeholder="Remove something by entering id and then pressing submit">
    <input type="submit">
  </form>
</body>

</html>