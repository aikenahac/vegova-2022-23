<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 12 - Naloga 3</title>
</head>

<body>
  <?php
  function vpisVBesedo(&$beseda, $n)
  {
    for ($i = 0; $i < $n; $i++) {

      $beseda = $beseda . chr(rand(ord('A'), ord('Z')));
    }
  }

  function prva($beseda)
  {
    $parts = str_split($beseda);
    sort($parts);
    return join('', $parts);
  }

  function zadnja($beseda)
  {
    $parts = str_split($beseda);
    rsort($parts);
    return join('', $parts);
  }

  function brezSamo($beseda)
  {
    $parts = str_split($beseda);
    $sog = array_filter($parts, function ($c) {
      switch ($c) {
        case 'A':
        case 'E':
        case 'I':
        case 'O':
        case 'U':
          return false;
      }
      return true;
    });
    return join('', $sog);
  }

  $beseda = "";
  vpisVBesedo($beseda, 10);
  echo "Beseda: $beseda<br>";

  echo 'Prva po abecedi: ' . prva($beseda) . '<br>';
  echo 'Zadnja po abecedi: ' . zadnja($beseda) . '<br>';
  echo 'Brez samoglasnikov: ' . brezSamo($beseda) . '<br>';
  ?>
</body>

</html>