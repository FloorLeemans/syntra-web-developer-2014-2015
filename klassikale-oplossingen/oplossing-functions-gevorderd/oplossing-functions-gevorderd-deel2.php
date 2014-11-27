<?php
   
    $pigHealth  =   5;
    $maxThrows  =   8;

    function calculateHit( $currentPigHealth, $currentThrows )
    {
        $container      =   array();
        $randomNumber   =   rand(0,9);
        $isHit          =   false;
        $message        =   'Mis! Nog ' . $currentPigHealth . ' varkens in het team.';
        
        if ( $randomNumber < 4 )
        {
            --$currentPigHealth;
            $isHit      =   true;
            $message    =   'Raak! Er zijn nog maar ' . $currentPigHealth . ' varkens over.';
        }

        --$currentThrows;

        $container['currentPigHealth']  =   $currentPigHealth;
        $container['currentThrows']     =   $currentThrows;
        $container['isHit']             =   $isHit;
        $container['message']           =   $message;

        return $container;
    }

    function launchAngryBird( $currentPigHealth, $currentThrows )
    {
        static $container = array();
        
        if ( $reset === true)
        {
            $container  =   array();
        }
        

        if ( $currentPigHealth != 0 && $currentThrows != 0 )
        {
            $hitData        =   calculateHit( $currentPigHealth, $currentThrows );
            $container[ ]   =   $hitData;
            launchAngryBird( $hitData['currentPigHealth'], $hitData[ 'currentThrows' ] ); 
        }
        else 
        {
            $eindresultaatArray     =   array( 'message' => 'Verloren!' );
            
            if ( $currentPigHealth === 0 )
            {
                $eindresultaatArray['message'] = 'Gewonnen!';
            }
            
            $container[] = $eindresultaatArray;
        }

        return $container;
    }

    $spelverloop = launchAngryBird( $pigHealth, $maxThrows );
    
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing functions gevorderd</title>
    </head>
    <body>
        
        <h1>Oplossing functions gevorderd: deel 2</h1>

        <ul>
            <?php foreach ($spelverloop as $worp): ?>
                <li><?= $worp[ 'message' ]?></li>
            <?php endforeach ?>
        </ul>

        
    </body>
</html>