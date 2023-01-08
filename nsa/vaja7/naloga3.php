<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 7 - Naloga 3</title>
</head>

<body>
  <?php
  function napolni(&$arr)
  {
    for ($i = 0; $i < 8; $i++) {
      array_push($arr, rand(0, 1));
    }
  }

  function prvaPretvorba($arr)
  {
    $num = 0;
    foreach ($arr as $i => $val) {
      $num += $val * pow(2, sizeof($arr) - 1 - $i);
    }
    return $num;
  }

  $arr = [];

  napolni($arr);

  $dec = prvaPretvorba($arr);

  print_r($arr);
  echo $dec;
  ?>
</body>

</html>