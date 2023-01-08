<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 10 - Naloga 2</title>
</head>

<style>
  table {
    border-collapse: collapse;
  }

  td,
  th {
    border: 1px solid black;
    text-align: center;
  }
</style>


<body>
  <pre>
    <?php

    include 'data_amerika.php';
    include 'funkcije.php';

    izpis1($amerika);

    $zvezneDrzave = ustvariTabeloDrzav($amerika);

    izpis2($zvezneDrzave);

    isci($amerika, 'D');
    isci($amerika, 'N');

    ?>
  </pre>
</body>

</html>