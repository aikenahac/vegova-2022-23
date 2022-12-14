<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaja 3, Naloga 4</title>
</head>

<body>
  <?php

  $a = rand(1, 7);

  echo "<span style='font-size: 10px'>$a</span>";
  for ($i = 2; $i < 6; $i++) {
    $num = $a * $i;
    $fontSize = 10 + 2 * $i;
    echo "<span style='font-size: ${fontSize}px'><$num</span>";
  }
  ?>
</body>

</html>