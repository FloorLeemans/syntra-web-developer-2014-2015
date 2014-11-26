<?php

	$dieren 	=	array( 'hond', 'schaap', 'slang', 'kat', 'hond', 'schaap', 'slang' );

	$dieren1[]	=	'hond';
	$dieren1[]	=	'schaap';
	$dieren1[]	=	'kat';
	$dieren1[]	=	'hond';
	$dieren1[]	=	'schaap';
	$dieren1[]	=	'slang';

	$voertuigen['landvoertuigen'] 	=	array( 'Vespa', 'fiets');
	$voertuigen['watervoertuigen'] 	=	array( 'surfplank', 'vlot', 'schoener', 'driemaster' );
	$voertuigen['luchtvoertuigen'] 	=	array( 'luchtballon', 'helicopter', 'B52');

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing arrays</title>
    </head>
    <body>

    	<h1>Oplossing arrays: basis</h1>

		<h1>Eerste methode</h1>
		
		<pre>
			<?php var_dump( $dieren ) ?>
		</pre>
		
		<h1>Tweede methode</h1>

		<pre>
			<?php var_dump( $dieren1 ) ?>
		</pre>

		<h1>Voertuigen</h1>

		<pre>
			<?php var_dump( $voertuigen ) ?>
		</pre>

    </body>
</html>