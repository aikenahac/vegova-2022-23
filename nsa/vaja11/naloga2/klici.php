<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vaja 11 - Naloga 2</title>
</head>

<body>
  <?php
  require_once('data.php');

  razvrsti_prvo($rezultati);
  print_r($rezultati);

  razvrsti_n($rezultati, 2);
  print_r($rezultati);

  razvrsti_sum($rezultati);
  print_r($rezultati);

  razvrsti_max($rezultati);
  print_r($rezultati);

  izbrisi_rezultate_pod_11($rezultati);
  print_r($rezultati);

  ?>
</body>

</html>