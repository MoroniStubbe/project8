    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About UNEED-IT</title>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/news.css">
    </head>

    <body>
        <?php readfile("header.html") ?>
        <main>
            <h2>Recent News</h2>
            <section id="news">
                <?php
                include_once("database.php");
                try {
                    $nieuwsbericht = $PDO->prepare("SELECT * FROM nieuws");
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