<?php
   
   $md5HashKey  =   'd1fa402db91a7a93c4f414b8278ce073';

   $karakter1   =   '2';
   $karakter2   =   '8';
   $karakter3   =   'a';

    function karakterInString1( $string, $karakter )
    {
        $absoluteAantal =   substr_count( $string, $karakter );
        $lengteString   =   strlen( $string );

        $procent    =   ( $absoluteAantal / $lengteString ) * 100;

        return $procent;
    }

    function karakterInString2( $karakter )
    {
        $string =   $GLOBALS[ 'md5HashKey' ];

        $absoluteAantal =   substr_count( $string, $karakter );
        $lengteString   =   strlen( $string );

        $procent    =   ( $absoluteAantal / $lengteString ) * 100;

        return $procent;
    }

    function karakterInString3( $karakter )
    {
        global $md5HashKey;

        $string =    $md5HashKey;

        $absoluteAantal =   substr_count( $string, $karakter );
        $lengteString   =   strlen( $string );

        $procent    =   ( $absoluteAantal / $lengteString ) * 100;

        return $procent;
    }

   $resultaat1 = karakterInString1( $md5HashKey, $karakter1 );
   $resultaat2 = karakterInString2( $karakter2 );
   $resultaat3 = karakterInString3( $karakter3 );
    
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing functions gevorderd</title>
    </head>
    <body>
        
        <h1>Oplossing functions gevorderd: deel 1</h1>

        <p>Het karakter "<?= $karakter1 ?>" komt <?= $resultaat1 ?>% voor in de string "<?= $md5HashKey ?>"</p>
        
        <p>Het karakter "<?= $karakter2 ?>" komt <?= $resultaat2 ?>% voor in de string "<?= $md5HashKey ?>"</p>
        
        <p>Het karakter "<?= $karakter3 ?>" komt <?= $resultaat3 ?>% voor in de string "<?= $md5HashKey ?>"</p>

    </body>
</html>