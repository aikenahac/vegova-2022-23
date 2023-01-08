<?php
function izpis1($tab)
{
  ksort($tab);

  echo '
<table>
  <thead>
    <th>Ime Kraja</th>
    <th>Kratica države</th>
    <th>Število prebivalcev</th>
  </thead>
  ';

  foreach ($tab as $ime => $pod) {
    echo '<tr>';
    $drz = $pod["drzava"];
    $preb = $pod["prebivalci"];

    echo "<td>$ime</td>";
    echo "<td>$drz</td>";
    echo "<td>$preb</td>";

    echo '</tr>';
  }

  echo '
</table><br>';
}

function ustvariTabeloDrzav($tab)
{
  $tab2 = [];
  foreach ($tab as $ime => $pod) {
    if (!key_exists($pod["drzava"], $tab2)) {
      $tab2[$pod["drzava"]] = [];
    }
    $tab2[$pod["drzava"]][$ime] = $pod["prebivalci"];
  }
  return $tab2;
}

function izpis2($tab)
{
  echo '<table>';
  foreach ($tab as $drz => $kr) {
    echo "
  <tr>
    <td colspan=\"2\">$drz</td>
  </tr>
  ";
    foreach ($kr as $ime => $preb) {
      echo "
  <tr>
    <td>$ime</td>
    <td>$preb</td>
  </tr>
  ";
    }
  }
  echo '
</table><br>';
}

function isci($tab, $crka)
{
  $tab2 = array_filter($tab, function ($k) use ($crka) {
    return str_starts_with($k, $crka);
  }, ARRAY_FILTER_USE_KEY);
  izpis1($tab2);
}
