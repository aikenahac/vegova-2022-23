<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 5 - Naloga 4</title>
</head>

<body>
  <?php
  $t = array();

  for ($i = 0; $i < 40; $i++) {
    array_push($t, rand(0, 255));
  }

  foreach ($t as $i => $v) {
    echo "$v ";
  }
  echo '<br>';

  echo 'ASCII kode velikih črk so na mestih: ';
  foreach ($t as $i => $v) {
    if ($v >= ord('A') && $v <= ord('Z')) {
      echo "$i ";
    }
  }
  echo '<br>';

  echo 'ASCII kode malih črk so na mestih: ';
  foreach ($t as $i => $v) {
    if ($v >= ord('a') && $v <= ord('z')) {
      echo "$i ";
    }
  }
  echo '<br>';

  echo 'ASCII kode ostalih znakov so na mestih: ';
  foreach ($t as $i => $v) {
    if (!($v >= ord('A') && $v <= ord('z'))) {
      echo "$i ";
    }
  }
  echo '<br>';
  ?>
</body>

</html>