<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vaja 5 - Naloga 2</title>
</head>


<style>
    table {
        width: 100vw;
        text-align: center;
        border-collapse: collapse;
    }

    td {
        border: 1px black solid;
    }

    .prvaCelica {
        background-color: lightgreen;
        color: darkgreen;
    }

    .zadnjaCelica {
        background-color: lightblue;
        color: blue;
    }

    .vmesnaCelica {
        background-color: lightyellow;
        color: black;
    }
</style>

<body>
    <?php
    $x = rand(1, 20);
    do {
        $y = rand(1, 20);
    } while ($x == $y);

    $max = max($x, $y);
    $min = min($x, $y);

    $t = array();
    for ($i = $min; $i <= $max; $i++) {
        if ($i === $min || $i === $max) {
            array_push($t, $i);
        } else {
            array_push($t, '*');
        }
    }

    echo '<table><tr>';
    foreach ($t as $i => $v) {
        if ($i === 0) {
            $class = 'prvaCelica';
        } else if ($i === count($t) - 1) {
            $class = 'zadnjaCelica';
        } else {
            $class = 'vmesnaCelica';
        }
        echo "<td class=\"$class\">" . $v . '</td>';
    }
    echo '</tr></table>';

    ?>
</body>

</html>