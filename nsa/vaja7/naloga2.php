<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 7 - Naloga 2</title>
</head>

<style>
  body {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  table {
    border-collapse: collapse;
  }

  .crta {
    width: 80%;
    border-top: 2px red solid;
    margin: 16px 0;
  }

  table.tabela-1,
  .tabela-1 tr,
  .tabela-1 td {
    border: 1px black solid;
  }


  .tabela-2 td {
    color: white;
    background-color: silver;
    border: 1px darkgray solid;
  }

  .tabela-3 td {
    color: blue;
    font-weight: bold;
    border: 2px darkblue dashed;
    background-color: lightblue;
  }

  .title {
    text-align: center;
    color: grey;
  }
</style>

<body>
  <?php
  function vpisi(&$t1)
  {
    for ($i = 0; $i < 20; $i++) {
      array_push($t1, rand(1, 10));
    }
  }

  function racunaj($t1, &$t2)
  {
    $sum = 0;
    for ($i = 0; $i < 10; $i++) {
      $sum += $t1[$i];
    }

    for ($i = 0; $i < count($t1); $i++) {
      array_push($t2, $sum - $t1[$i]);
    }
  }

  function izpis($t1, $t2)
  {
    echo '<table class="tabela-1">';
    echo '<tr>';
    echo '<td>Prva tabela</td>';
    foreach ($t1 as $i => $val) {
      echo "<td>$val</td>";
    }
    echo '</tr>';
    echo '<tr>';
    echo '<td>Druga tabela</td>';
    foreach ($t2 as $i => $val) {
      echo "<td>$val</td>";
    }
    echo '</tr>';
    echo '</table>';
  }

  function izpis2($t1, $t2)
  {
    echo '<span class="title">Prvi izpis</span>';
    echo '<table class="tabela-2">';
    echo '<tr>';
    echo '<td>Prva tabela</td>';
    foreach ($t1 as $val) {
      echo "<td>$val</td>";
    }
    echo '</tr>';
    echo '<tr>';
    echo '<td>Druga tabela</td>';
    foreach ($t2 as $val) {
      echo "<td>$val</td>";
    }
    echo '</tr>';
    echo '</table>';
  }

  function izpis3($t1, $t2)
  {
    echo '<span class="title">Drugi izpis</span>';
    echo '<table class="tabela-3">';
    echo '<tr>';
    echo '<td>Prva tabela</td>';
    foreach (array_reverse($t1) as $i => $val) {
      echo "<td>$val</td>";
    }
    echo '</tr>';
    echo '<tr>';
    echo '<td>Druga tabela</td>';
    foreach (array_reverse($t2) as $val) {
      echo "<td>$val</td>";
    }
    echo '</tr>';
    echo '</table>';
  }

  $t1 = [];
  $t2 = [];

  vpisi($t1);
  racunaj($t1, $t2);
  // izpis($t1, $t2);

  izpis2($t1, $t2);

  echo '<div class="crta"></div>';

  izpis3($t1, $t2);
  ?>
</body>

</html>