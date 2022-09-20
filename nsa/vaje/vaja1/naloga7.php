<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<style>
  table {
    border: 1px solid;
  }
</style>

<body>
  <table>
    <?php
      $a = 1;

      for ($x = 0; $x < 10; $x++) {
        echo '<tr>';
        for ($y = 0; $y < 10; $y++) {
          echo '<td>' . $a . '</td>';
          $a = $a + 2;
        }
        echo '</tr>';
      }
    ?>
  </table>
</body>
</html>
