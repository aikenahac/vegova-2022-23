<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naloga 4</title>
</head>
<body>
  <?php
    $x = "00111011";
    
    $xdec = bindec($x);
    $xoct = decoct($xdec);
    $xhex = dechex($xdec);

    // primer a
    echo $xdec."<br/>";

    // primer b
    echo $xoct."<br/>";

    // primer c
    echo $xhex."<br/>";
  ?>
</body>
</html>