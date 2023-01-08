<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 5 - Naloga 6</title>
</head>

<body>
  <?php
  $tab = array();
  $try_count = 0;

  while (count($tab) < 10) {
    $try_count++;
    $val = rand(1, 1000);
    if ($val % 23 === 0) {
      array_push($tab, $val);
    }
  }

  $num = $tab[count($tab) - 1];
  echo "V $try_count. poskusu je dobljeno število $num<br>";

  foreach ($tab as $i => $v) {
    echo "$v ";
  }
  ?>
</body>

</html>