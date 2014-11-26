<?php
   
    $maxGetal   =   100;
    $teller     =   0;

    $container  =   array();

    while( $teller <= $maxGetal )
    {
        $container[]  =  $teller;
        ++$teller;
    }

    $getallenString =   join( $container, ', ' );
    $product        =   array_product( $container );

    var_dump( $container );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing conditional statements while</title>
    </head>
    <body>
        
        <h1>Oplossing conditional statements while</h1>

        <p><?= $getallenString ?></p>

        <p>En het product is <?= $product ?></p>
        
    </body>
</html>