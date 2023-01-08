<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 11 - Naloga 1</title>
</head>

<style>
  table {
    border-collapse: collapse;
    text-align: center;
  }

  td,
  th {
    border: 1px black solid;
    padding: 4px;
  }
</style>

<body>
  <pre>
    <?php
    require_once('gorivo.php');

    izpis_podatkov($d, 3);

    razvrsti($d);

    izpis_podatkov($d, 0);
    izpis_tabela($d);

    $kat = [];
    prepisi($d, $kat);

    print_r($kat);
    ?>
  </pre>
</body>

</html>