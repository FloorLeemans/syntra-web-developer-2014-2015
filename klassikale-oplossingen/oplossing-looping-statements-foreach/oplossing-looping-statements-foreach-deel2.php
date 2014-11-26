<?php
   
    $text   =   file_get_contents( 'text-file.txt' );

    $textUppercase  =   strtoupper( $text );

    $characterArray =   count_chars( $textUppercase, 1 );

    $alphabetArray  =   array();

    for( $karakterNumber = 65; $karakterNumber <= 90; ++$karakterNumber )
    {
        if ( isset(  $characterArray[ $karakterNumber ] ) )
        {
            $karakter   =   chr( $karakterNumber );
            
            $alphabetArray[ $karakter ] =   $characterArray[ $karakterNumber ];
        }
    }

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
    
        <table>
            <thead>
                <tr>
                    <th>karakter</th>
                    <th>ASCII-nummer</th>
                    <th>Aantal in tekst</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($alphabetArray as $character => $occurence): ?>
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