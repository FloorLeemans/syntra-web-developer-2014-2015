<?php
   
    $text   =   file_get_contents( 'text-file.txt' );

    $textArray     =   str_split( $text );

    // Kopiëren omdat rsort invloed heeft op de originele array (pass by reference!)
    $gesorteerdeArray   =   $textArray;

    rsort( $gesorteerdeArray );

    $omgedraaideArray   =   array_reverse( $gesorteerdeArray );
    
    $characterArray =   array();


    foreach( $omgedraaideArray as $character )
    {
        if( !isset( $characterArray[ $character ] ) )
        {
            $characterArray[ $character ]   =   1;
        }
        else
        {
            ++$characterArray[ $character ];
        }
    }

    $aantalKarakters    =   count( $textArray );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing conditional statements foreach</title>
    </head>
    <body>
        
        <h1>Oplossing conditional statements foreach</h1>

        <p>In totaal kwamen er <?= $aantalKarakters ?> karakters voor in de string.</p>

        <table>
            <thead>
                <tr>
                    <th>karakter</th>
                    <th>ASCII-nummer</th>
                    <th>Aantal in tekst</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($characterArray as $character => $occurence): ?>
                    <tr>
                        <td><?= $character ?></td>
                        <td><?= ord( $character ) ?></td>
                        <td><?= $occurence ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        
        
    </body>
</html>