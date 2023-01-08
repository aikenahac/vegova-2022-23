
<?php

function napolni()
{
  $x = rand(2, 8);

  $arr = [];
  for ($i = 0; $i < $x; $i++) {
    $arr2 = [];
    for ($j = 0; $j < $x; $j++) {
      if ($i == $j) {
        array_push($arr2, '*');
      } else if ($i > $j) {
        array_push($arr2, $x);
      } else {
        array_push($arr2, '0');
      }
    }
    array_push($arr, $arr2);
  }

  return $arr;
}

function izpisi1($arr)
{
  echo '<table>';
  for ($i = 0; $i < sizeof($arr); $i++) {
    echo '<tr>';
    for ($j = 0; $j < sizeof($arr[$i]); $j++) {
      $val = $arr[$i][$j];
      echo "<td>$val</td>";
    }
    echo '</tr>';
  }
  echo '</table>';
}
function izpisi2($arr)
{
  echo '<table>';
  for ($i = 0; $i < sizeof($arr); $i++) {
    echo '<tr>';
    for ($j = 0; $j < sizeof($arr[$i]); $j++) {
      $val = $arr[$i][$j];
      if ($i === $j) {
        echo "<td class=\" rdeca\">$val</td>";
      } else if ($i < $j) {
        echo "<td class=\" modra\">$val</td>";
      } else {
        echo "<td class=\"zelena\">$val</td>";
      }
    }
    echo '</tr>';
  }
  echo '</table>';
}
?>