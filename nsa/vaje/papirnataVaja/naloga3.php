<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naloga 3</title>
</head>
<body>
  <?php 
    $x = 25;
    $y = "a";

    echo "$x $y"."<br/>";

    echo '$x $y'.'<br/>';

    echo '$x + $y'.'<br/>';

    echo "$x + $y"."<br/>";

    $y = 30;
    echo $x + $y."<br/>";

    $z = "30";
    echo $x + $z."<br/>";

    $t = "30g";
    echo $x + $t."<br/>";

    // Razlika med " in ': "" podpira spremenljivke v nizu brez združevanja, ' pa ne

    // PHP interpretacija vrednosti pri aritmeticnih operacijah: nize pretvori v stevila
  ?>
</body>
</html>