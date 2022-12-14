<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaja 10, Naloga 1</title>
</head>

<style>
  table {
    border-collapse: collapse;
  }

  .ogdata {
    background-color: green;
  }

  .sorteddata {
    background-color: red;
  }

  td {
    border: 2px solid gray;
    font-style: italic;
  }
</style>

<body>
  <?php
  $numarr = [];

  for ($i = 0; $i < 10;) {
    $rand = rand(100, 400);

    if ($rand % 2 !== 0) {
      array_push($numarr, $rand);
      $i++;
    }
  }

  echo "<table class='ogdata'><caption>Originalni podatki</caption>";

  foreach ($numarr as $num) {
    echo "<td>$num</td>";
  }

  echo "</table>";

  $sorteddesc = $numarr;

  rsort($sorteddesc);

  echo "<table class='sorteddata'><caption><b>Padajoče razvrščeni podatki</b></caption>";

  foreach ($sorteddesc as $num) {
    echo "<td>$num</td>";
  }

  echo "</table>";
  ?>
</body>

</html>