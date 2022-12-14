<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaja 3, Naloga 5</title>
</head>


<style>
  .match {
    color: red;
    font-size: 12pt;
  }

  .large {
    color: blue;
    font-size: 16pt;
  }

  .smalls {
    color: green;
    font-size: 10pt;
  }
</style>

<body>
  <?php
  $large = rand(65, 90);
  $match = false;

  $smalls = '';

  for ($i = 0; $i < 3; $i++) {
    $small = rand(97, 122);
    if ($small - 32 == $velika) {
      $match = true;
    }
    $smalls = $smalls . chr($small);
  }
  if ($match) {
    echo '<span class="match">' . chr($large) . $smalls . '</span>';
  } else {
    echo '<span class="velika">' . chr($large) . '</span>';
    echo '<span class="smalls">' . $smalls . '</span>';
  }
  ?>
</body>

</html>