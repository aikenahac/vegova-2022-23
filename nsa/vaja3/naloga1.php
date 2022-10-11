<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaja 3, Naloga 1, primer b</title>
</head>
<body>
  <?php
    define("pi", 3.14);

    $r = rand(-10, 100);

    $obd = round(2 * pi * $r, 6); // Obseg z definiranim pi
    $pld = round(pi * $r * $r, 9+6); // Ploscina z definiranim pi

    $obf = round(2 * pi() * $r, 6); // Obseg s funkcijo pi
    $plf = round(pi() * $r * $r, 6); // Obseg s funkcijo pi

    if ($r < 0) {
      echo "Takega kroga ni (r: $r)";
    } else if ($r == 0) {
      echo "To je točka (r: $r)";
    } else {
      echo "r: $r<br/><br/>";
      echo "Z definiranim pi:<br/>";
      echo "Obseg: $obd, Ploscina: $pld<br/><br/>";

      echo "S funkcijo pi:<br/>";
      echo "Obseg: $obf, Ploscina: $plf";
    }
  ?>
</body>
</html>