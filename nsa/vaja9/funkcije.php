<?php

function napolniT($vozila)
{
  global $t;
  foreach ($vozila as $vozilo) {
    $t[$vozilo[0]] = [
      "zaloga" => $vozilo[1],
      "prodano" => $vozilo[2],
    ];
  }
}

function nakup(string $ime, string $znamka)
{
  global $t;

  if (!key_exists($znamka, $t) || $t[$znamka]["zaloga"] === 0) {
    return 0;
  }

  $t[$znamka]["zaloga"]--;
  $t[$znamka]["prodano"]++;

  global $lastniki;

  if (!key_exists($ime, $lastniki)) {
    $lastniki[$ime] = [];
  }
  array_push($lastniki[$ime], $znamka);

  return 1;
}

function prodaja(string $ime, string $znamka)
{
  global $lastniki;
  global $t;

  if (!key_exists($ime, $lastniki) || !in_array($znamka, $lastniki[$ime])) {
    return 0;
  }

  $t[$znamka]["zaloga"]++;

  $i = array_search($znamka, $lastniki[$ime]);
  array_splice($lastniki[$ime], $i, 1);

  return 1;
}

function izpisLastnikov(string $znamka)
{
  global $lastniki;

  foreach ($lastniki as $ime => $znamke) {
    if (in_array($znamka, $znamke)) {
      echo "$ime<br>";
    }
  }
}

function prodajaVseh(string $ime)
{
  global $lastniki;
  global $t;

  if (!key_exists($ime, $lastniki) || !sizeof($lastniki[$ime])) {
    return 0;
  }

  foreach ($lastniki[$ime] as $znamka) {
    $t[$znamka]["zaloga"]++;
  }

  $lastniki[$ime] = [];

  return 1;
}

function prikazKolicin()
{
  global $t;
  global $lastniki;

  echo '<table>';

  echo '<thead>';
  echo '<th></th>';
  foreach (array_keys($t) as $znamka) {
    echo "<th>$znamka</th>";
  }
  echo '</thead>';

  echo '<tbody>';
  foreach ($lastniki as $ime => $znamke) {
    echo '<tr>';
    echo "<td>$ime</td>";
    $znamkeCount = array_count_values($znamke);
    foreach (array_keys($t) as $znamka) {
      $count = 0;
      if (key_exists($znamka, $znamkeCount)) {
        $count = $znamkeCount[$znamka];
      }
      echo "<td>$count</td>";
    }
    echo '</tr>';
  }
  echo '</tbody>';

  echo '</table>';
}
