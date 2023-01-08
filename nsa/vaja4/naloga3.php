<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vaja 4 - Naloga 3</title>
</head>

<style>
    .even {
        font-family: Courier;
        font-size: 12px;
    }

    .odd {
        font-family: Verdana;
        font-size: 10px;
    }
</style>

<body>
    <?php
    $count_even = 0;
    $sum_even = 0;

    while (true) {
        $n = rand(1, 100);
        $even = $n % 2 == 0;

        if ($even) {
            $count_even++;
            $sum_even += $n;
        }

        $cl = $even ? 'even' : 'odd';
        echo "<span class='$cl'> $n </span>";

        if (chr($n) == 'T') break;
    }
    echo '<br>';

    $avg = $sum_even / $count_even;

    echo 'Povprečje sodih = ' . number_format($avg, 2, ',');
    ?>
</body>

</html>