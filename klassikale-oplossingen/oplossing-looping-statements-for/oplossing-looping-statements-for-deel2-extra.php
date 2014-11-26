<?php
   
    $maxTafel   =   10;
    $maxProduct =   10;

    $tafels =   array();

    for($rij = 0; $rij <= $maxTafel; ++$rij)
    {
        $productArray   =   array();

        for($kolom = 0; $kolom <= $maxProduct; ++$kolom)
        {
            $productArray[ $kolom ] = $rij * $kolom;
        }

        $tafels[ $rij ]  =   $productArray;
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing conditional statements for</title>

        <style>

            table
            {
                border-collapse:collapse;
            }

            td
            {
                border:1px solid #EEEEEE;
                padding:8px;
            }

        </style>
    </head>
    <body>
        
        <h1>Oplossing conditional statements for</h1>

        <table>

            <?php foreach( $tafels as $tafel ): ?>
                
                <tr>
                    <?php foreach($tafel as $product): ?>

                        <td><?= $product ?></td>

                    <?php endforeach ?>
                </tr>

            <?php endforeach ?>

        </table>

    </body>
</html>