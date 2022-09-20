<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naloga 2</title>
</head>

<body>
  <?php
    $x = 30;
    echo '<p>Varianta 1 s piko</p>';
    echo 'opis: '.var_dump($x).'<br/>';

    echo '<p>Varianta 2 z vejico</p>';
    echo 'opis: ',var_dump($x),'<br/>';

    echo '<p>Varianta 3 kombinacija vejica, pika</p>';
    echo 'opis: ',var_dump($x).'<br/>';

    echo '<p>Varianta 4 kombinacija pika, vejica</p>';
    echo 'opis: '.var_dump($x),'<br/>';

    // Razlika med vejico in piko: če je pika (prva), bo var_dump($x) prikazan na začetku niza,
    // če pa uporabimo vejico (prvo), pa bo var_dump($x) prikazan tako kot želimo
  ?>
</body>
</html>