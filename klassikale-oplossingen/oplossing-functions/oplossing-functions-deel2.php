<?php

    $htmlString =   '<html>Dit is een test</html>';
    $test   =   "dit is een test";
    $namen  =   array( "Olga", "Boran", "Carl", "Yasmine" );

    
    function drukArrayAf( $array )
    {
        $container  =   array( );

        end( $GLOBALS );
        $arrayName  =   key( $GLOBALS );

        foreach( $array as $key => $value )
        {
            $container[ ]   =   $arrayName . '[ ' . $key . ' ] heeft waarde "' . $value . '"';
        }

        return $container;
    }

    $namenBewerkt = drukArrayAf( $namen );

    function validateHtmlTag( $string )
    {
        $isValid    =   false;

        $openingTag =   '<html>';
        $closingTag =   '</html>';

        $firstPos   =   strpos( $string, $openingTag );
        $lastPos   =   strpos( $string, $closingTag );

        $expectedLastClosingPos   =   strlen( $string ) - strlen( $closingTag );

        if ( $firstPos === 0  && 
            $lastPos == $expectedLastClosingPos )
        {
            $isValid    =   true;
        }

        return $isValid;
    }

    $validHtml = validateHtmlTag( $htmlString );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing conditional functions</title>
    </head>
    <body>
        
        <h1>Oplossing functions: deel 2</h1>

        <ul>
            <?php foreach ($namenBewerkt as $naam): ?>
                <li><?= $naam ?></li>
            <?php endforeach ?>
        </ul>

        <p>De HTML-string "<?= htmlentities( $htmlString ) ?>" is <?= ( $validHtml ) ? 'geldig' : 'niet geldig' ?></p>

    </body>
</html>