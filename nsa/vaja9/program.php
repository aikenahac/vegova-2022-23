<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 9</title>
</head>

<style>
  table {
    border-collapse: collapse;
  }

  tbody tr:nth-child(odd) {
    background-color: lightgreen;
  }

  tbody tr:nth-child(even) {
    background-color: lightsalmon;
  }

  td,
  th {
    border: 1px black solid;
    text-align: center;
    width: 100px;
  }
</style>


<body>
  <pre>
  <?php
  require_once 'funkcije.php';
  require_once 'data.php';

  $lastniki = [];

  napolniT($vozila);

  for ($i = 0; $i < 5; $i++) {
    $ime = $oseba[array_rand($oseba)];
    $znamka = array_rand($t);
    if (nakup($ime, $znamka)) {
      echo 'Nakup izveden<br>';
    } else {
      echo 'Nakup ni izveden<br>';
    }
    print_r($t);
    print_r($lastniki);
  }

  for ($i = 0; $i < 5; $i++) {
    $ime = $oseba[array_rand($oseba)];
    $znamka = array_rand($t);

    if (prodaja($ime, $znamka)) {
      echo 'Prodaja izvedena<br>';
    } else {
      echo 'Prodaja ni izvedena<br>';
    }

    print_r($t);
    print_r($lastniki);

    izpisLastnikov('Jaguar');
  }

  if (prodajaVseh(array_rand($lastniki))) {
    echo 'Prodano vse<br>';
  } else {
    echo 'Ni osebe<br>';
  }

  if (prodajaVseh('Pikapolonica')) {
    echo 'Prodano vse<br>';
  } else {
    echo 'Ni osebe<br>';
  }

  prikazKolicin();

  ?>
  </pre>
</body>

</html>