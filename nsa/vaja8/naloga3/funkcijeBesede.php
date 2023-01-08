<?php

function randomString()
{
  $str = "";
  for ($i = 0; $i < 10; $i++) {
    $str .= chr(rand(ord('a'), ord('z')));
  }
  return $str;
}

function split($str)
{
  $samoglasniki = "";
  $soglasnki = "";

  foreach (str_split($str) as $key => $value) {
    if (array_search($value, ['a', 'e', 'i', 'o', 'u'])) {
      $samoglasniki .= $value;
    } else {
      $soglasnki .= $value;
    }
  }

  $samLen = strlen($samoglasniki);
  $sogLen = strlen($soglasnki);

  echo "Samoglasniki ($samLen): $samoglasniki<br>";
  echo "Soglasniki ($sogLen): $soglasnki<br>";

  for ($i = ord('a'); $i < ord('z'); $i++) {
    foreach (str_split($soglasnki) as $key => $value) {
      if ($value === chr($i)) {
        echo "Prvi soglasnik: $value";
        return;
      }
    }
  }
}
