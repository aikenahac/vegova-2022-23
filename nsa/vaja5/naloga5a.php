<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 5 - Naloga 5a</title>
</head>

<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px black solid;
  }

  .red {
    color: red;
  }

  .blue {
    color: blue;
  }
</style>

<body>
  <?php
  $tab = [];
  $sum = 0;

  for ($i = 0; $i < 10; $i++) {
    $val = rand(100, 400);
    $sum += $val;
    array_push($tab, $val);
  }

  $avg = $sum / count($tab);

  echo '<table><tr>';
  foreach ($tab as $i => $v) {
    $class = $v < $avg ? 'red' : 'blue';
    echo "<td class=\"$class\">" . $v . '</td>';
  }
  echo '</tr><table>';
  ?>
</body>

</html>