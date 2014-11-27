<?php
   
    $getal1     =   10;
    $getal2     =   9;
    $string     =   "Eerste oplossing van functies.";

    function berekenSom( $getal1, $getal2 )
    {
        $som    =   $getal1 + $getal2;

        return $som;
    }

    function vermenigvuldig( $getal1, $getal2 )
    {
        $product    =   $getal1 * $getal2;

        return $product;
    }

    function isEven( $getal )
    {
        $isEven =   false;

        if( $getal % 2 == 0 )
        {
            $isEven =   true;
        }

        return $isEven;
    }

    function calculateLengthAndUppercase( $string )
    {
        $container  =   array();

        $length       =   strlen( $string );
        $uppercase    =   strtoupper( $string );

        $container[ 'length' ]      =   $length;
        $container[ 'uppercase' ]   =   $uppercase;

        return $container;
    }

    $som            =   berekenSom( $getal1, $getal2 );
    $product        =   vermenigvuldig( $getal1, $getal2 );
    $isEven         =   isEven( $getal1 );
    $stringGegevens =   calculateLengthAndUppercase( $string );
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing functions</title>
    </head>
    <body>
        
        <h1>Oplossing functions: deel 1</h1>

        <p>De som van <?= $getal1 ?> en <?= $getal2 ?> is: <?= $som ?></p>
        <p>Het product van <?= $getal1 ?> en <?= $getal2 ?> is: <?= $product ?></p>
        <p>Het getal <?= $getal1 ?> is <?= ( $isEven ) ? "true" : "false" ?></p>
        <p>De lengte van de string "<?= $string ?>" bedraagt <?= $stringGegevens[ 'length' ] ?> karakters. In uppercase ziet deze er als volgt uit: <?= $stringGegevens[ 'uppercase' ] ?></p>
    </body>
</html>