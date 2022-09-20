<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naloga 1</title>
</head>

<body>
  <?php
    $seq = 1;
    $fontSize = 10;
    for ($x = 0; $x < 10; $x++) {
      $seq = ($seq * 2) + 1;
      echo "<p style=\"font-size:${fontSize}px\">${seq}</p>";
      $fontSize = $fontSize + 2;
    }
  ?>
</body>
</html>