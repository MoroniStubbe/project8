<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}">

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
</head>

<body>
    <x-header></x-header>
    <main>
        <section id="faq">
            <?php
            include_once app_path('Models/database.php');
            include_once app_path('Models/text_panel.php');
            $PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
            $db = new Database($PDO);
            $faq = new TextPanel($db, 'faq');
            $faq = $faq->read();
            
            echo '<ul>';
            
            foreach ($faq as $faq_item) {
                echo "<li><span class='question'>" . $faq_item['message'] . '</span>';
                echo "<div class='answer'>" . $faq_item['answer'] . '</li>';
            }
            
            echo '</ul>';
            ?>
        </section>
    </main>
    <x-footer></x-footer>
</body>

</html>
