<?php

	$getal 	=	2;

	$dag 	=	'Deze dag bestaat niet.';

	if ( $getal == 1 )
	{
		$dag	=	'maandag';
	}

	if ( $getal == 2 )
	{
		$dag	=	'dinsdag';
	}

	if ( $getal == 3 )
	{
		$dag	=	'woensdag';
	}

	if ( $getal == 4 )
	{
		$dag	=	'donderdag';
	}

	if ( $getal == 5 )
	{
		$dag	=	'vrijdag';
	}

	if ( $getal == 6 )
	{
		$dag	=	'zaterdag';
	}

	if ( $getal == 7 )
	{
		$dag	=	'zondag';
	}

	if ( $getal >= 1 && $getal <= 7 )
	{
		$dag 	=	strtoupper( $dag );

		$dagHoofdletterUit	=	str_replace( 'A', 'a', $dag );

		$laatsteCharPos	=	strrpos( $dag, 'A' );

		$dagLaatsteHoofdletterUit	=	substr_replace( $dag, 'a', $laatsteCharPos, 1 );
	}
	

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing conditional statements</title>

        <style>
			
			.green
			{
				background-color: lightgreen;
			}

			.large
			{
				font-size:24px;
			}

        </style>
    </head>
    <body>

    	<h1>Oplossing conditional statements</h1>

		<p ><?= $dag ?></p>

		<p ><?= $dagHoofdletterUit ?></p>

		<p><?= $dagLaatsteHoofdletterUit ?></p>

    </body>
</html>