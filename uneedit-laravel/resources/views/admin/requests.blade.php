<html>

<head>
  <link rel="stylesheet" href="{{ asset('css/admin_panel.css') }}">
</head>

<body>
  <x-admin_nav></x-admin_nav>
  <main>
    <?php
    $PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
    include_once app_path('Models/database.php');
    include_once app_path('Models/repair_request.php');
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