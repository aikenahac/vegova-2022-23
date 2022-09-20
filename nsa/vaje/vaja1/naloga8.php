<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<style>
  td {
    border-bottom: 1px solid;
    width: 50px;
    text-align: right;
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
