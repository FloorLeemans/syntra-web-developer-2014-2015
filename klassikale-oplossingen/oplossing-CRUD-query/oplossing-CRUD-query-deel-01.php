<?php

	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken

	// Query string
	$queryString	=	'SELECT *
							FROM bieren
    							INNER JOIN brouwers
    							ON bieren.brouwernr = brouwers.brouwernr
    						WHERE bieren.naam LIKE "Du%"
    						AND brouwers.brnaam LIKE "%a%"';

    $statement	=	$db->prepare( $queryString );

    $statement->execute();

    $resultaten	=	array();

    // Resultaten
    while( $row = $statement->fetch( PDO::FETCH_ASSOC )  )
    {
    	$resultaten[]	=	$row;
    }

    // Kolomnamen
	$kolomnamen = array_keys( $resultaten[0] );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <style>
         	table
            {
                font-size:12px;
                overflow:auto;
            }

            table th,
            table td
            {
                padding:4px;
            }

            table th
            {
                background: #DFDFDF;
                text-align:center;
            }

            table tr
            {
                transition: all 0.2s ease-out;
            }

            table tr:hover
            {
                background-color:lightgreen;
            }

            .odd
            {
                background: #F1F1F1;
            }
		</style>
    </head>
    <body>

    	<table>
    		<thead>
    			<tr>
    				<th>#</th>
    				<?php foreach ($kolomnamen as $kolomnaam): ?>
    					<th><?= $kolomnaam ?></th>
    				<?php endforeach ?>
    			</tr>
    		</thead>

    		<tbody>
    			<?php foreach ($resultaten as $nummer => $resultaat): ?>
    				<tr>
    					<td><?= ( $nummer + 1 ) ?></td>
    					<?php foreach ($resultaat as $kolomValue): ?>
    						<td><?= $kolomValue ?></td>
    					<?php endforeach ?>
    				</tr>
    			<?php endforeach ?>
    		</tbody>
    	</table>
        
    </body>
</html>