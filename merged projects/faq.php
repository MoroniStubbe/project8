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
        include_once("classes/database.php");
        include_once("classes/text_panel.php");
        $db = new Database($PDO);
        $faq = new TextPanel($db, "faq");
        $faq = $faq->read();

        echo '<ul>';

        foreach ($faq as $faq_item) {
            echo "<li><span class='question'>" . $faq_item["message"] . "</span>";
            echo "<div class='answer'>" . $faq_item["answer"] . "</li>";
        }
        ?>
    </section>
</main>
<?php readfile("footer.html") ?>
</body>

</html>