<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vaja 3, Naloga 2</title>
</head>

<body>
  <?php
  $rezultat = rand(0, 20);
  $starost = rand(0, 20);

  echo "Rezultat: $rezultat<br/>Starost: $starost<br/><br/>";
  if (($rezultat > 10) && ($starost < 10)) {
    echo "<p style='color: green;'>Odlično</p>";
  } else if (($rezultat > 10) && ($starost > 10)) {
    echo "<p style='color: blue;'>Povprečno</p>";
  } else if (($rezultat < 10) && ($starost < 10)) {
    echo "<p style='color: blue;'>Podpovprečno</p>";
  } else if (($rezultat < 10) && ($starost > 10)) {
    echo "<p style='color: red;'>Katastrofalno</p>";
  } else {
    echo "Ni veljavnega besedila.";
  }
  ?>
</body>

</html>