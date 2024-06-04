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
                $faqEntries = $PDO->prepare("SELECT * FROM faq");
                $faqEntries->execute();

                echo '<ul>';

                foreach ($faqEntries->fetchAll() as $data) {
                    echo "<li><strong>Question:</strong> " . htmlspecialchars($data["message"]) . "<br>";
                    echo "<span>Answer:</span> " . htmlspecialchars($data["answer"]) . "</li>";
                }

                echo '</ul>';
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            ?>
        </section>
    </main>
    <?php readfile("footer.html") ?>
</body>

</html>