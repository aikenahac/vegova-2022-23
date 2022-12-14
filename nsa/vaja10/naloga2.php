<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaja 10, Naloga 2</title>
</head>

<style>
  table {
    border-collapse: collapse;
  }

  td,
  th {
    border: 1px solid;
    padding: 2px 10px;
  }
</style>

<body>
  <?php
  $amerika = array(
    "NewYork" => array("drzava" => "NY", "prebivalci" => 8008278),
    "Detroit" => array("drzava" => "MI", "prebivalci" => 951270),
    "Los Angeles" => array("drzava" => "CA", "prebivalci" => 3694820),
    "SanAntonio" => array("drzava" => "TX", "prebivalci" => 1144646),
    "Houston" => array("drzava" => "TX", "prebivalci" => 1953631),
    "Philadelphia" => array("drzava" => "PA", "prebivalci" => 1517550),
    "Phoenix" => array("drzava" => "AZ", "prebivalci" => 1321045),
    "SanDiego" => array("drzava" => "CA", "prebivalci" => 1223400),
    "Chicago" => array("drzava" => "IL", "prebivalci" => 2896016),
    "Dallas" => array("drzava" => "TX", "prebivalci" => 1188580)
  );

  function izpis1($amerika)
  {
    $sortedusa = $amerika;

    ksort($sortedusa);

    echo "<table><tr><th>Ime Kraja</th><th>Kratica države</th><th>Število prebivalcev</th></tr>";

    foreach ($sortedusa as $city => $details) {
      echo "<tr>";
      echo "<td>$city</td>";
      echo "<td>" . $details["drzava"] . "</td>";
      echo "<td>" . $details["prebivalci"] . "</td>";
      echo "</tr>";
    }

    echo "</table>";
  }

  function ustvariTabeloDrzav($amerika)
  {
    $zvezneDrzave = [];

    foreach ($amerika as $city => $details) {
      if (!array_key_exists($details["drzava"], $amerika)) {
        $zvezneDrzave = $zvezneDrzave + [$details["drzava"] => []];
      }

      $zvezneDrzave[$details["drzava"]] = $zvezneDrzave[$details["drzava"]] + [$city => $details["prebivalci"]];

      arsort($zvezneDrzave[$details["drzava"]]);
    }

    ksort($zvezneDrzave);

    return $zvezneDrzave;
  }

  function izpis2($zvezneDrzave)
  {
    echo "<table>";

    foreach ($zvezneDrzave as $drz => $details) {
      echo "<tr><td colspan='2' style='text-align: center;'>$drz</td></tr>";

      foreach ($details as $city => $residentCount) {
        echo "<tr><td>$city</td><td>$residentCount</td></tr>";
      }
    }

    echo "</table>";
  }

  function isci($firstL, $amerika)
  {
    echo "<table>";

    echo "<table><tr><th>Ime Kraja</th><th>Kratica države</th><th>Število prebivalcev</th></tr>";
    foreach ($amerika as $city => $details) {
      if ($city[0] === $firstL) {
        echo "<tr>";
        echo "<td>$city</td>";
        echo "<td>" . $details["drzava"] . "</td>";
        echo "<td>" . $details["prebivalci"] . "</td>";
        echo "</tr>";
      }
    }
    echo "</table>";
  }

  izpis1($amerika);

  $zvezneDrzave = ustvariTabeloDrzav($amerika);

  echo "<br/>";

  izpis2($zvezneDrzave);

  echo "<br/>";

  isci("D", $amerika);
  echo "<br/>";
  isci("N", $amerika);
  ?>
</body>

</html>