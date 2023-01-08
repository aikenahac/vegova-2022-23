<?php
$rezultati = array(
  "Miha" => array(14, 11, 12, 14),
  "Vid" => array(13, 20, 15, 16),
  "Rok" => array(12, 11, 9, 9),
  "Tim" => array(13, 20, 11, 14),
  "Jan" => array(8, 11, 12, 16),
  "Luk" => array(17, 14, 20, 16)
);

function razvrsti_prvo(array &$r)
{
  rsort($r);
}

function razvrsti_n(array &$r, int $n)
{
  usort($r, function ($a, $b) use ($n) {
    return $b[$n] - $a[$n];
  });
}

function razvrsti_sum(array &$r)
{
  usort($r, function ($a, $b) {
    return array_sum($b) - array_sum($a);
  });
}

function razvrsti_max(array &$r)
{
  usort($r, function ($a, $b) {
    rsort($a);
    rsort($b);
    foreach ($a as $i => $v) {
      if ($v !== $b[$i]) {
        return $b[$i] - $v;
      }
    }
  });
}

function izbrisi_rezultate_pod_11(array &$r)
{
  foreach ($r as $ime => $rez) {
    $f = array_filter($rez, function ($a) {
      return $a >= 11;
    });
    if (!count($f)) {
      unset($r[$ime]);
    } else {
      $r[$ime] = $f;
    }
  }
}
