    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About UNEED-IT</title>
        <link rel="stylesheet" href="css/nieuws.css">
        <link rel="stylesheet" href="css/custom.css"> 
    </head>
    <body>
        <header>
            <div class="container">
                <div class="logo">
                    <img src="img/logo.png" alt="UNEED-IT Logo">
                </div>
                <nav class="nav">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="nieuws.php">Nieuws</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="aanvraag.php">Aanvraag doen</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="h2text"><h2>Recent News</h2></div>
        <div class="main-content">
            <section class="news">
                <div class="containerr">
                    <?php
                        try {
                            $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
                            $nieuwsbericht = $db->prepare("SELECT * FROM nieuws");
                            $nieuwsbericht->execute();

                            echo '<ul>';

                            foreach($nieuwsbericht->fetchAll() as $data) {
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
