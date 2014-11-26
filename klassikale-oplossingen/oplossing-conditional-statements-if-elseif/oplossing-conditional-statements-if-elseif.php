<?php

	$getal		=	116;
	$ondergrens	=	0;
	$bovengrens	=	0;

	$antwoord	=	"";

	if ( $getal >=0 && $getal < 10 )
	{
		$ondergrens	=	0;
		$bovengrens	=	10;
	}
	elseif ( $getal >=10 && $getal < 20 )
	{
		$ondergrens	=	10;
		$bovengrens	=	20;
	}
	elseif ( $getal >=20 && $getal < 30 )
	{
		$ondergrens	=	20;
		$bovengrens	=	30;
	}
	elseif ( $getal >=30 && $getal < 40 )
	{
		$ondergrens	=	30;
		$bovengrens	=	40;
	}
	elseif ( $getal >=40 && $getal < 50 )
	{
		$ondergrens	=	40;
		$bovengrens	=	50;
	}
	elseif ( $getal >=50 && $getal < 60 )
	{
		$ondergrens	=	50;
		$bovengrens	=	60;
	}
	else
	{
		$ondergrens	=	false;
		$bovengrens	=	false;
	}

	if ( $ondergrens !== false )
	{
		$antwoord 	=	'Het getal' . $getal . 'ligt tussen ' . $ondergrens . ' en ' . $bovengrens . '.';
	}
	else
	{
		$antwoord 	=	'Het getal ' . $getal . 'is niet geldig.'; 
	}

	$antwoordReverse 	=	strrev( $antwoord );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing conditional statements</title>
    </head>
    <body>

    	<h1>Oplossing conditional statements: if elseif</h1>

		<p><?= $antwoordReverse ?></p>

    </body>
</html>