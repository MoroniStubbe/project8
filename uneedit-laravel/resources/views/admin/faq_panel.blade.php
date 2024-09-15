<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/admin_panel.css') }}">
</head>

<body>
    <x-admin_nav></x-admin_nav>
    <main>
        <?php
        include_once app_path('Models/database.php');
        include_once app_path('Models/text_panel.php');
        $PDO = DB::connection(env('DB_CONNECTION_UNEEDIT'))->getPdo();

        try {
            $db = new Database($PDO);
            $textPanel = new TextPanel($db, 'faq');

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (
                    isset($_POST["addmessage"]) && isset($_POST["addanswer"]) &&
                    !empty(trim($_POST["addmessage"])) && !empty(trim($_POST["addanswer"]))
                ) {
                    $textPanel->create(trim($_POST["addmessage"]), trim($_POST["addanswer"]));
                    echo "Entry added successfully.";
                }

                if (isset($_POST["rmnew"]) && !empty(trim($_POST["rmnew"]))) {
                    $idToDelete = (int)trim($_POST["rmnew"]);
                    if ($textPanel->delete($idToDelete)) {
                        echo "Entry with ID $idToDelete deleted successfully.";
                    } else {
                        echo "Failed to delete entry with ID $idToDelete.";
                    }
                }
            }
            $result = $textPanel->read();
            if (!empty($result)) {
                echo "<table class='table1'>";
                foreach ($result as $data) {
                    echo "<tr>";
                    echo "<td>" . (isset($data["message"]) ? htmlspecialchars($data["message"]) : 'N/A') . "</td>";
                    echo "<td>" . (isset($data["answer"]) ? htmlspecialchars($data["answer"]) : 'N/A') . "</td>";
                    echo "<td>" . htmlspecialchars($data["ID"]) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No entries found.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </main>
    <form method="post" class="input1">
        @csrf
        <input name="addmessage" type="text" placeholder="Add question">
        <input name="addanswer" type="text" placeholder="Add answer">
        <input type="submit">
    </form>
    <form method="post" class="input1">
        @csrf
        <input name="rmnew" type="text" placeholder="Remove entry by entering id">
        <input type="submit">
    </form>
</body>

</html>