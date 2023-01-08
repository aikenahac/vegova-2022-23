<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vaja 4 - Naloga 4</title>
</head>

<body>
    <?php
    $num = rand(10000, 99999);
    $nstr = strval($num);

    $split = str_split($nstr);

    $min = $split[0];
    $max = $split[0];

    foreach ($split as $k => $v) {
        if ($v < $min) $min = $v;
        if ($v > $max) $max = $v;
    }

    $min_count = 0;
    $max_count = 0;

    foreach ($split as $k => $v) {
        if ($v == $min) $min_count++;
        if ($v == $max) $max_count++;
    }

    echo "$num<br>";

    echo "Najmanjša števka v številu je $min in se ponovi $min_count krat<br>";
    echo "Največja števka v številu je $max in se ponovi $max_count krat.";
    ?>
</body>

</html>