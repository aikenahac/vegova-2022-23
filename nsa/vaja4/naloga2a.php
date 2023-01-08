<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vaja 4 - Naloga 2a</title>
</head>

<style>
    table {
        border-collapse: collapse;
    }

    td {
        border: 1px black solid;
    }
</style>

<body>
    <?php
    $c = 0;

    echo '<table>';

    for ($i = 0; $i < 5; $i++) {
        echo '<tr>';
        for ($j = 0; $j < 5; $j++) {
            $c++;
            echo "<td>$c</td>";
        }
        echo '</tr>';
    }

    echo '</table>';

    ?>
</body>

</html>