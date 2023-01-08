<?php
function napolni()
{
    $t1 = [];
    for ($i = 0; $i < 70; $i++) {
        array_push($t1, chr(rand(ord('A'), ord('Z'))));
    }
    return $t1;
}

function razvrstiNarascajoce(&$t1)
{
    sort($t1);
}

function narediT2($t1)
{
    $t2 = array_count_values($t1);
    for ($i = ord('A'); $i < ord('Z'); $i++) {
        $char = chr($i);
        if (!key_exists($char, $t2)) {
            $t2[$char] = 0;
        }
    }
    return $t2;
}
