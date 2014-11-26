<?php
   
    $maxGetal   =   100;

    $container  =   array();

    for( $teller = 0; $teller <= $maxGetal; ++$teller )
    {
        $container[]  =  $teller;
    }

    $getallenString =   join( $container, ', ' );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing conditional statements for</title>
    </head>
    <body>
        
        <h1>Oplossing conditional statements for</h1>

        <p><?= $getallenString ?></p>
        
    </body>
</html>