<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Vaja 10 - Naloga 3</title>
</head>

<style>
	table {
		border-collapse: collapse;
	}

	td {
		border: 1px solid black;
	}

	.first {
		background-color: grey;
	}

	.last {
		background-color: lightblue;
	}
</style>


<body>
	<?php
	include 'funkcije.php';

	$t1 = napolni();

	razvrstiNarascajoce($t1);

	echo '
<table>
  <tr>
';

	foreach ($t1 as $c) {
		if ($c === $t1[0]) {
			echo "<td class=\"first\">$c</td>";
		} else if ($c === $t1[count($t1) - 1]) {
			echo "<td class=\"last\">$c</td>";
		} else {
			echo "<td>$c</td>";
		}
	}

	echo '
  </tr>
</table>
<br>
';

	$count = array_count_values($t1);

	$najm = $t1[0];
	$najmc = $count[$najm];
	echo "Najmanjša črka $najm se v tabeli ponovi $najmc krat.<br>";

	$najv = $t1[count($t1) - 1];
	$najvc = $count[$najv];
	echo "Največja črka $najv se v tabeli ponovi $najvc krat.<br>";

	$t2 = narediT2($t1);

	arsort($t2);

	print_r($t2);

	?>
</body>

</html>