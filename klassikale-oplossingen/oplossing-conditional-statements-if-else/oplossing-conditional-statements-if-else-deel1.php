<?php

	$jaar				=	2012;
	// $isSchrikkeljaar	=	false;

	if ( $jaar % 4 == 0 && 
			$jaar % 100 != 0 ||
			$jaar % 400 == 0
		)
	{
		$isSchrikkeljaar = true;
	}
	else
	{
		$isSchrikkeljaar = false;
	}

	var_dump( $isSchrikkeljaar );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing conditional statements</title>

    </head>
    <body>

    	<h1>Oplossing conditional statements: if else</h1>

		<p>Het jaar <?= $jaar ?> is <?= ( $isSchrikkeljaar ) ? '' : 'g' ?>een schrikkeljaar.</p>
    </body>
</html>