<?php

	$timestamp	=	mktime( 22, 35, 25, 01, 21, 1904 );

	$formattedDate	=	date( "d F Y, h:i:s a", $timestamp );

	/*
	setlocale( LC_ALL, 'nld_nld' );
	$localDate	=	strftime( '%d %B %Y, %H:%M:%S %p', $timestamp );
	*/

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing date</title>
    </head>
    <body>

	<h1>Oplossing date</h1>

	<p>De timestamp van 22u 35m 25sec 21 januari 1904 is <?= $timestamp ?></p>

	<p>De geformateerde versie van de timestamp is: <?= $formattedDate ?></p>

    </body>
</html>