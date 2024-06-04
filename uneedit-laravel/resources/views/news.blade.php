    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About UNEED-IT</title>
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
        <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    </head>

    <body>
        <x-header></x-header>
        <main>
            <h2>Recent News</h2>
            <section id="news">
                <?php
                $PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();
                include_once app_path('Models/database.php');
                include_once app_path('Models/text_panel.php');
                $db = new Database($PDO);
                $news = new TextPanel($db, 'news');
                $news = $news->read();
                
                echo '<ul>';
                
                foreach ($news as $news_item) {
                    echo '<li>' . $news_item['message'] . '</li>';
                }
                
                echo '</ul>';
                
                ?>
            </section>
        </main>
        <x-footer></x-footer>
    </body>

    </html>
