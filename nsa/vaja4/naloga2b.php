<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 4 - Naloga 2b</title>
</head>

<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px black solid;
  }
</style>

<body>
  <?php
  $c = 0;

  $x = rand(3, 20);
  $y = rand(3, 20);

  echo '<table>';

  for ($i = 0; $i < $y; $i++) {
    echo '<tr>';
    for ($j = 0; $j < $x; $j++) {
      $c++;
      echo "<td>$c</td>";
    }
    echo '</tr>';
  }

  echo '</table>';

  ?>
</body>

</html>