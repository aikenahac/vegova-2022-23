<?php
$d = array(
  "1431" => array("ime" => "Rok", "natocenoGorivo" => array(55, 54, 36, 45, 41)),
  "1488" => array("ime" => "Vid", "natocenoGorivo" => array(70, 72)),
  "1492" => array("ime" => "Luka", "natocenoGorivo" => array(38, 42, 46, 37, 40, 40))
);

$d["2231"] = [
  "ime" => "Aiken Tine",
  "natocenoGorivo" => [30],
];

array_push($d["2231"]["natocenoGorivo"], 41);

function izpis_podatkov(array $d, int $n)
{
  foreach ($d as $id => $kupec) {
    if (count($kupec["natocenoGorivo"]) >= $n) {
      echo "Šifra kupca=$id";
      echo ' Ime=' . $kupec["ime"];
      echo ' Natočeno gorivo=' . join(" ", $kupec["natocenoGorivo"]);
      echo '<br>';
    }
  }
  echo '<br>';
}

function razvrsti(array &$d)
{
  uasort($d, function ($a, $b) {
    return array_sum($a["natocenoGorivo"]) - array_sum($b["natocenoGorivo"]);
  });
}

$d["9999"] = [
  "ime" => "Zdenka",
  "natocenoGorivo" => [],
];

function izpis_tabela(array $d)
{
  uasort($d, function ($a, $b) {
    return strcmp($a["ime"], $b["ime"]);
  });

  echo '
  <table>
    <thead>
      <th>Ime</th>
      <th>Najmanjša kol. goriva</th>
      <th>Največja kol. goriva</th>
    </thead>
    <tbody>
  ';

  foreach ($d as $kupec) {
    echo '<tr>';
    echo '<td>' . $kupec["ime"] . '</td>';
    if (count($kupec["natocenoGorivo"])) {
      echo '<td>' . min($kupec["natocenoGorivo"]) . '</td>';
      echo '<td>' . max($kupec["natocenoGorivo"]) . '</td>';
    } else {
      echo '<td>N/A</td>';
      echo '<td>N/A</td>';
    }
    echo '</tr>';
  }

  echo '
    </tbody>
  </table>
  ';
}

function prepisi(array $d, array &$kat)
{
  foreach ($d as $id => $kupec) {
    foreach ($kupec["natocenoGorivo"] as $g) {
      $k = (floor($g / 10) - 1) * 10;
      if (!isset($kat[$k])) {
        $kat[$k] = [];
      }
      if (!in_array($id, $kat[$k])) {
        array_push($kat[$k], $id);
      }
    }
  }

  usort($kat, function ($a, $b) {
    return count($b) - count($a);
  });
}
