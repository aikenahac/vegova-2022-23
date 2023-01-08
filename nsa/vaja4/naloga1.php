<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vaja 4 - Naloga 1</title>
</head>

<style>
    .pr {
        color: red;
    }

    .po {
        color: blue;
    }
</style>

<body>
    <?php
    $letter = rand(ord('G'), ord('N'));

    echo 'Črka = ' . chr($letter) . '<br>';

    echo 'Predhodnjih 5 črk: ';
    echo '<span class="pr">';

    letterOutput($letter, -5, 0);

    echo '</span>';
    echo '<br>';

    echo 'Naslednjih 5 črk: ';
    echo '<span class="po">';

    letterOutput($letter, 1, 6);

    echo '</span>';

    function letterOutput($letter, $from, $to)
    {
        for ($i = $from; $i < $to; $i++) {
            echo chr($letter + $i) . '&nbsp;&nbsp;';
        }
    }
    ?>
</body>

</html>