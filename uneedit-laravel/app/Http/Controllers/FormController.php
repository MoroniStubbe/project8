<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public static function print_table($data)
    {
        if (count($data)) {
            echo "<form>";
            echo csrf_field();
            echo "<table class='table1'><tr>";
            foreach (array_keys($data[0]) as $key) {
                echo "<th>" . $key . "</th>";
            }
            echo "</tr>";

            foreach ($data as $row) {
                echo "<tr>";
                foreach ($row as $col) {
                    echo "<td>" . $col . "</td>";
                }
                echo "</tr>";
            }
            echo "</table></form>";
        }
    }
}
