<?php

	$timestamp	=	221108521;

	$minuten	=	floor( $timestamp / 60);
	$uren		=	floor( $minuten / 60);
	$dagen		=	floor( $uren / 24);
	$weken		=	floor( $dagen / 7);
	$maanden	=	floor( $dagen / 31);	
	$jaren		=	floor( $dagen / 365);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing conditional statements</title>
    </head>
    <body>

    	<h1>Oplossing conditional statements: if else - deel 2</h1>

		<ul>
			
			<li>minuten: <?= $minuten ?></li>
			<li>uren: <?= $uren ?></li>
			<li>dagen: <?= $dagen ?></li>
			<li>weken: <?= $weken ?></li>
			<li>maanden: <?= $maanden ?></li>
			<li>jaren: <?= $jaren ?></li>

		</ul>
		
    </body>
</html>