<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

$time = microtime(TRUE);

$participants = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
shuffle($participants);

$result = array();

for ($i = 0; $i < count($participants) - 1; $i++) {
	$result[$participants[$i]] = $participants[$i + 1];
}

$result[$participants[count($participants) - 1]] = $participants[0];

$time = number_format((microtime(TRUE) - $time), 10);

echo '<pre>';
print_r($result);
echo '</pre>';
echo '<br />' . 'Pairing took ' . $time . ' seconds';
echo '<br />' . 'Memory usage: ' . convert(memory_get_usage(TRUE));

function convert($size)
{
	$unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
	return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
}