<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 12 - Naloga 2</title>
</head>

<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px solid black;
    padding: 8px;
  }

  #inner td:first-child {
    color: red;
  }
</style>

<body>
  <pre>
    <?php
    require_once('fifa.php');

    function razvrsti(&$t)
    {
      foreach ($t as $skupina => $drzave) {
        arsort($t[$skupina]);
      }
    }

    function izpis($t)
    {
      echo '<table>';
      foreach ($t as $skupina => $drzave) {
        echo '<tr>';
        echo "<td>$skupina</td>";
        echo '<td><table id="inner">';
        foreach ($drzave as $drzava => $tocke) {
          echo "<td>$drzava $tocke</td>";
        }
        echo '</table></td></tr>';
      }
      echo '</table>';
    }

    razvrsti($t);
    izpis($t);

    function razvrstiPoAbecedi(&$t)
    {
      ksort($t);
    }

    razvrstiPoAbecedi($t);

    print_r($t);
    ?>
  </pre>
</body>

</html>