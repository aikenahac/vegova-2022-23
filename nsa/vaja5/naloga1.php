<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 5 - Naloga 1</title>
</head>


<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px black solid;
  }

  .blue {
    color: blue;
  }

  .red {
    color: red;
  }
</style>

<body>
  <?php
  $t = [];

  for ($i = 0; $i < 10; $i++) {
    $char = chr(rand(ord("a"), ord("z")));
    array_push($t, $char);
  }

  echo '<table><tr>';
  for ($i = 0; $i < 10; $i++) {
    $class = 'blue';
    switch ($t[$i]) {
      case 'a':
      case 'e':
      case 'i':
      case 'o':
      case 'u':
        $class = 'red';
    }
    echo "<td class=\"$class\">" . $t[$i] . '</td>';
  }
  echo '</tr></table>';
  ?>
</body>

</html>