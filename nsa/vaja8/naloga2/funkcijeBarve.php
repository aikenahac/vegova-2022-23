<?php

function addPoints(&$tab)
{
  for ($i = 0; $i < 5; $i++) {
    $x = rand(-9, 9);
    $y = rand(-9, 9);

    if ($x >= 0) {
      if ($y >= 0) {
        array_push($tab["red"], [$x, $y]);
      } else {
        array_push($tab["green"], [$x, $y]);
      }
    } else {
      if ($y >= 0) {
        array_push($tab["blue"], [$x, $y]);
      } else {
        array_push($tab["silver"], [$x, $y]);
      }
    }
  }
}

function printPoints($tab)
{
  echo '<table>';

  foreach ($tab as $color => $points) {
    echo '<tr>';
    foreach ($points as $point) {
      echo "<td style=\"color: $color\">($point[0], $point[1])</td>";
    }
    echo '</tr>';
  }

  echo '</table>';
}
