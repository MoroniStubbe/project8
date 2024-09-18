<?php

use App\Http\Controllers\RequestController;

?>

<html>

<head>
  <link rel="stylesheet" href="{{ asset('css/admin_panel.css') }}">
</head>

<body>
  <x-admin_nav></x-admin_nav>
  <main>
    <?php RequestController::showAll(); ?>
  </main>
</body>

</html>