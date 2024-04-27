    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About UNEED-IT</title>
        <link rel="stylesheet" href="css/nieuws.css">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/nav.css">
    </head>

    <body>
        <header>
            <div>
                <div>
                    <a href="index.html"><img src="img/logo.png" alt="UNEED-IT Logo"></a>
                </div>
                <nav>
                    <ul>
                        <li><a href="about.html">About</a></li>
                        <li><a href="nieuws.php">Nieuws</a></li>
                        <li><a href="service.html">Service </a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="aanvraag.php">Aanvraag</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="Bezorgdiensten.html">Bezorgdiensten</a></li>
                        <li><a href="account.php">Account</a>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="h2text">
            <h2>Recent News</h2>
        </div>
        <div class="main-content">
            <section class="news">
                <div class="containerr">
                    <?php
                    include_once("database.php");
                    try {
                        $nieuwsbericht = $PDO->prepare("SELECT * FROM nieuws");
                        $nieuwsbericht->execute();

                        echo '<ul>';

                        foreach ($nieuwsbericht->fetchAll() as $data) {
                            echo "<li>" . $data["nieuwsbericht"] . "</li>";
                        }

                        echo '</ul>';
                    } catch (PDOException $e) {
                        echo "connection failed" . $e->getMessage();
                    }
                    ?>
                </div>
            </section>
        </div>

        <footer>
            <div class="container">
                <p>&copy; 2024 UNEED-IT. All rights reserved.</p>
            </div>
        </footer>
    </body>

    </html>