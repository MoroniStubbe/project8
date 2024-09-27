<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public static function print_table($data)
    {
        if (!count($data)) {
            return;
        }

        echo "<form>";
        echo csrf_field();
        echo "<button>Create</button>";
        echo "<table class='table1'>";
        echo "<tr>";

        //headers
        foreach (array_keys($data[0]) as $key) {
            echo "<th>" . $key . "</th>";
        }

        echo "<th>Edit</th>";
        echo "<th>Delete</th>";
        echo "</tr>";

        //rows
        foreach ($data as $row) {
            echo "<tr>";

            foreach ($row as $col) {
                echo "<td>" . $col . "</td>";
            }

            echo "<th><button>Edit</button></th>";
            echo "<th><button>Delete</button></th>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</form>";
    }
}
