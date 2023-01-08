<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vaja 4 - Naloga 5</title>
</head>

<body>
    <?php
    $n = rand(10, 500);
    $bin = decbin($n);
    $sep = str_split($bin);

    $c = 0;

    foreach ($sep as $k => $v) {
        if ($v == 0) $c++;
    }

    if ($c == 0) printValReg('= 0');
    if ($c <= 2) printValReg('<= 2');
    if ($c <= 4) printValReg('<= 4');
    if ($c >= 5) echo 'Število ima vsaj 5 bitov z vrednostjo 0.<br>';

    function printValReg($val)
    {
        echo "Število bitov z vrednostjo 0 $val<br>";
    }
    ?>
</body>

</html>