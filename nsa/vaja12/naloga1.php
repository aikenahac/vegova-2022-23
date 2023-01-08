<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 12 - Naloga 1</title>
</head>

<body>
  <?php
  function random($n, $a, $b)
  {
    $del3 = [];
    $ostala = [];

    for ($i = 0; $i < $n; $i++) {
      $num = rand($a, $b);
      if ($num % 3 == 0) {
        array_push($del3, $num);
      } else {
        array_push($ostala, $num);
      }
    }

    echo 'Tabela del3 ima ' . count($del3) . ' elementov<br>';
    echo 'Tabela ostala ima ' . count($ostala) . ' elementov<br>';

    echo 'Najčevje število tabele del3 je ' . max($del3) . '.<br>';
    echo 'Najčevje število ostala je ' . max($ostala) . '.';
  }

  random(rand(30, 50), rand(100, 150), rand(250, 300));

  ?>
</body>

</html>