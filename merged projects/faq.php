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
                echo "<li><span class='question'>" . htmlspecialchars($data["message"]) . "</span>";
                echo "<div class='answer'>" . htmlspecialchars($data["answer"]) . "</div></li>";
            }

            echo '</ul>';
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </section>
</main>

<?php readfile("footer.html") ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const questions = document.querySelectorAll(".question");

        questions.forEach(question => {
            question.addEventListener("click", function() {
                const answer = this.nextElementSibling;
                if (answer.style.display === "block") {
                    answer.style.display = "none";
                } else {
                    answer.style.display = "block";
                }
            });
        });
    });
</script>

</body>

</html>
