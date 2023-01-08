<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vaja 4 - Naloga 6</title>
</head>


<style>
    table {
        border-collapse: collapse;
    }

    .cell-r {
        border-bottom: 1px black solid;
        border-right: 1px black solid;
    }

    .cell-l {
        border-bottom: 1px black solid;
        border-left: 1px black solid;
    }
</style>

<body>
    <?php
    $x = rand(3, 9);
    $y = rand(0, 1);

    echo '<table>';

    for ($i = 0; $i < $x; $i++) {
        echo '<tr>';
        for ($j = 0; $j < $x; $j++) {
            if ($y == 0 && $i == $j) {
                echo '<td class="cell-l">' . $x . '</td>';
            } else if ($y == 1 && $x - $i == $j) {
                echo '<td class="cell-r">' . $x . '</td>';
            } else {
                echo '<td />';
            }
        }
        echo '</tr>';
    }

    echo '</table>';
    ?>
</body>

</html>