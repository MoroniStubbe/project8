<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ</title>
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/faq.scss">
</head>

<body>
  <?php readfile("header.html") ?>
  <main>

      <section id="faq">
          <?php
          include_once("database.php");
          try {
              $nieuwsbericht = $PDO->prepare("SELECT * FROM faq");
              $nieuwsbericht->execute();

              echo '<ul>';

              foreach ($nieuwsbericht->fetchAll() as $data) {
                  echo "<li>" . $data["message"] . "</li>";
              }

              echo '</ul>';
          } catch (PDOException $e) {
              echo "connection failed" . $e->getMessage();
          }
          ?>
      </section>
  </main>
  <?php readfile("footer.html") ?>
</body>

</html>