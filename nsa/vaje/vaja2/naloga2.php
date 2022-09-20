<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Druga vaja - druga naloga</title>
</head>

<style>
  #a0 {
    color: green;
    font-size: 14px;
  }

  #a1 {
    color: blue;
    font-size: 20px;
  }

  #a2 {
    color: red;
    font-size: 30px;
  }
</style>

<body>
  <?php
    for ($i = 0; $i < 3; $i++) {
      echo '<p id="a'.$i.'">Spletna aplikacija</p>';
    }
  ?>
</body>
</html>