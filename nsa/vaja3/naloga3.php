<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaja 3, Naloga 3</title>
</head>

<body>
  <?php
  $letnica = rand(1500, 2100);

  define("notGapYear", "<p style='color: red;'>Leto <b>$letnica ni</b> prestopno leto.</p>");
  define("isGapYear", "<p style='color: blue;'>Leto <b>$letnica je</b> prestopno leto.</p>");

  $by4 = false;
  $by100 = false;
  $by400 = false;

  if ($letnica % 4 == 0) {
    $by4 = true;
    if ($letnica % 100 == 0) {
      $by100 = true;
    }

    if ($letnica % 400 == 0) {
      $by400 = true;
    }
  }

  !$by4 ? notGapYear : ($by4 && $by100 && $by400 ? isGapYear : ($by4 && $by100 && !$by400 ? notGapYear : ($by4 ? isGapYear : notGapYear)));
  ?>
</body>

</html>