<?php

function countColors(array $tab)
{
  $tab2 = [];
  foreach ($tab as $value) {
    if (!array_key_exists($value, $tab2)) {
      $tab2[$value] = [];
    }
    array_push($tab2[$value], 1);
  }
  return $tab2;
}

function colorIndex(array $tab)
{
  $tab2 = [];
  foreach ($tab as $key => $value) {
    if (!array_key_exists($value, $tab2)) {
      $tab2[$value] = [];
    }
    array_push($tab2[$value], $key);
  }
  return $tab2;
}

function countColors2(array $tab)
{
  $tab2 = [];
  foreach ($tab as $value) {
    if (!array_key_exists($value, $tab2)) {
      $tab2[$value] = 0;
    }
    $tab2[$value] += 1;
  }
  return $tab2;
}

function verticalPrint(array $tab)
{
  $max = 0;
  foreach ($tab as $key => $tab2) {
    if (is_array($tab2)) {
      $size = sizeof($tab2);
    } else {
      $size = 1;
    }
    if ($size > $max) {
      $max = $size;
    }
  }

  echo '<table class="vertical">';

  foreach ($tab as $key => $tab2) {
    echo "<tr><td colspan=\"$max\">$key</td></tr>";
    echo '<tr>';
    if (is_array($tab2)) {
      foreach ($tab2 as $key => $value) {
        echo "<td>$value</td>";
      }
    } else {
      echo "<td>$tab2</td>";
    }
    echo '</tr>';
  }

  echo '</table>';
}

function horizontalPrint(array $tab)
{
  echo '<table class="horizontal">';

  foreach ($tab as $key => $tab2) {
    echo "<tr>";
    echo "<td class=\"keys\">$key</td>";
    foreach ($tab2 as $key => $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }

  echo '</table>';
}
