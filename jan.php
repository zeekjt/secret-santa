<?php

$time_start = microtime(true);



$a = range( 0, 99999 );

shuffle( $a );



$time_end = microtime( TRUE );
$time = $time_end - $time_start;


echo 'Time spend: ' . $time . ' sec <br />';
echo 'Memory usage: ' . convert( memory_get_usage( TRUE ) );


function convert( $size )
{
	$unit = array( 'b', 'kb', 'mb', 'gb', 'tb', 'pb' );
	return @round( $size / pow( 1024, ( $i = floor( log( $size, 1024 ) ) ) ), 2 ) . ' ' . $unit[$i];
}