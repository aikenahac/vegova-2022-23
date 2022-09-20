<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Druga vaja – tretja naloga – sistemske informacije</title>
</head>

<style>
  #date {
    color: red;
    font-size: 18px;
  }

  #time {
    color: navy;
  }

  #lunch {
    font-weight: bold;
    font-style: italic;
    color: green;
  }
</style>

<body>
  <?php
    echo 'Danes je <span id="date">'. date("d.m.Y") . "</span><br/>";
    echo 'Ura je <span id="time">'. date("h:i:s") . "</span><br/>";
    echo '<span id="lunch">Kmalu bo malica!</span>';
  ?>
</body>
</html>