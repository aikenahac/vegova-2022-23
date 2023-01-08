<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 8 - Naloga 2</title>
</head>

<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px black solid;
    padding: 8px;
  }
</style>

<body>
  <?php
  include 'tocke.php';
  include 'funkcijeBarve.php';

  addPoints($tocke);

  printPoints($tocke);
  ?>
</body>

</html>