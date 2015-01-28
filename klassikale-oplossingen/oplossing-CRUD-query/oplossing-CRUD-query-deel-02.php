<?php

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );

	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken

	// Query string
	/*$queryString	=	'SELECT *
							FROM bieren
    							INNER JOIN brouwers
    							ON bieren.brouwernr = brouwers.brouwernr
    						WHERE bieren.naam LIKE "Du%"
    						AND brouwers.brnaam LIKE "%a%"';*/

    $brouwersQueryString    =   'SELECT brouwernr, 
                                        brnaam
                                    FROM brouwers';

    $brouwersStatement	=	$db->prepare( $brouwersQueryString );

    $brouwersStatement->execute();

    $brouwers	=	array();

    // Resultaten
    while( $row = $brouwersStatement->fetch( PDO::FETCH_ASSOC )  )
    {
    	$brouwers[]	=	$row;
    }

    $brouwernr  =   1;

    if ( isset( $_GET[ 'brouwernr' ] ) )
    {
        $brouwernr  =   $_GET[ 'brouwernr' ];
    }

    $bierenQueryString  =   'SELECT naam
                                FROM bieren
                                WHERE brouwernr = :brouwernr';

    $bierenStatement    =   $db->prepare( $bierenQueryString );

    $bierenStatement->bindValue( ':brouwernr', $brouwernr );

    $bierenStatement->execute();

    $bieren   =   array();

    // Resultaten
    while( $row = $bierenStatement->fetch( PDO::FETCH_ASSOC )  )
    {
        $bieren[] =   $row;
    }

    // Kolomnamen
	$bierenKolomnamen = array_keys( $bieren[0] );

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
                border-collapse:collapse;
            }

            table th,
            table td
            {
                padding:4px;
                border: 1px solid lightgrey;
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
        
        <form action="<?= BASE_URL ?>">

            <label for="brouwers">Selecteer brouwer</label>

            <select name="brouwernr" id="brouwers">
                
                <?php foreach ( $brouwers as $brouwer ): ?>
                    <option value="<?= $brouwer[ 'brouwernr' ] ?>" <?= ( $brouwer[ 'brouwernr' ] === $brouwernr ) ? 'selected' : '' ?>><?= $brouwer[ 'brnaam' ] ?></option>  
                <?php endforeach ?>

            </select>

            <input type="submit" value="Zoek">

        </form>


    	<table>
    		<thead>
    			<tr>
    				<th>#</th>
    				<?php foreach ($bierenKolomnamen as $bierenKolomnaam): ?>
    					<th><?= $bierenKolomnaam ?></th>
    				<?php endforeach ?>
    			</tr>
    		</thead>

    		<tbody>

    			<?php foreach ( $bieren as $nummer => $bier ): ?>

    				<tr class="<?= ( ( $nummer + 1 ) % 2 !== 0 ) ? 'odd' : '' ?>">
    					<td><?= ( $nummer + 1 ) ?></td>

    					<?php foreach ($bier as $kolomValue): ?>
    						<td><?= $kolomValue ?></td>
    					<?php endforeach ?>

    				</tr>

    			<?php endforeach ?>

    		</tbody>
    	</table>
        
    </body>
</html>