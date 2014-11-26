<?php

	$getal 	=	9;

	$dag 	=	'Deze dag bestaat niet.';

	$dagHoofdletterUit	=	false;
	$dagLaatsteHoofdletterUit	=	false;

	switch( $getal )
	{
		case 1:
			$dag	=	'maandag';
			break;

		case 2:
			$dag	=	'dinsdag';
			break;

		case 3:
			$dag	=	'woensdag';
			break;

		case 4:
			$dag	=	'donderdag';
			break;

		case 5:
			$dag	=	'vrijdag';
			break;

		case 6:
			$dag	=	'zaterdag';
			break;

		case 7:
			$dag	=	'zondag';
			break;

		default:
			$dag 	=	'Deze dag bestaat niet.';
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
    </head>

    <body>

    	<h1>Oplossing conditional statements: switch</h1>

		<p ><?= $dag ?></p>

		<p ><?= $dagHoofdletterUit ?></p>

		<p><?= $dagLaatsteHoofdletterUit ?></p>

    </body>
</html>