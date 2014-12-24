<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

$start = microtime(true);

$participants = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
shuffle($participants);

$result = array();

for ($i = 0; $i < count($participants) - 1; $i++) {
	$result[$participants[$i]] = $participants[$i + 1];
}

$result[$participants[count($participants) - 1]] = $participants[0];

$end = number_format((microtime(true) - $start), 3);

echo '<pre>';
print_r($result);
echo '</pre>';
echo '<br />' . 'Pairing took ' . $end . ' seconds';