<?php

    try
    {

        session_start();

        define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );

        $message    =   false;

        if ( isset( $_POST[ 'submit' ] ) )
        {
            $brouwernaam    =   $_POST[ 'brnaam' ];   
            $adres          =   $_POST[ 'adres' ];
            $postcode       =   $_POST[ 'postcode' ];
            $gemeente       =   $_POST[ 'gemeente' ];
            $omzet          =   $_POST[ 'omzet' ];


            $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken

            $insertBrouwerQuery =   'INSERT INTO brouwdqsders (brnaam,
                                                    adres,
                                                    postcode,
                                                    gemeente,
                                                    omzet
                                                )

                                        VALUES ( :brouwernaam,
                                                    :adres,
                                                    :postcode,
                                                    :gemeente,
                                                    :omzet
                                                )';

            $insertBrouwerStatement = $db->prepare( $insertBrouwerQuery );

            $insertBrouwerStatement->bindValue( ':brouwernaam', $brouwernaam );
            $insertBrouwerStatement->bindValue( ':adres', $adres );
            $insertBrouwerStatement->bindValue( ':postcode', $postcode );
            $insertBrouwerStatement->bindValue( ':gemeente', $gemeente );
            $insertBrouwerStatement->bindValue( ':omzet', $omzet );

            $insertBrouwerStatement->execute();

            $errorArray =   $insertBrouwerStatement->errorInfo();

            if ( $errorArray[0] === '00000' )
            {
                $_SESSION[ 'message' ][ 'type' ]    =   'success';
                $_SESSION[ 'message' ][ 'text' ]    =   'De brouwer ' . $brouwernaam . ' is succesvol toegevoegd';
            }
            else
            {
                throw new Exception( 'De brouwer ' . $brouwernaam . ' kon niet worden toegevoegd. Reden: ' . $errorArray[ 2 ] );
            }
        }


        
    }
    catch( Exception $e )
    {
        $_SESSION[ 'message' ][ 'type' ]    =   'error';
        $_SESSION[ 'message' ][ 'text' ]    =   $e->getMessage();
    }

    if( isset( $_SESSION[ 'message' ] ) )
    {
        $message['type']    =   $_SESSION[ 'message' ][ 'type' ];
        $message['text']    =   $_SESSION[ 'message' ][ 'text' ];

        unset( $_SESSION[ 'message' ] );
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing CRUD Insert</title>
        <style>

            label
            {
                display:block;
            }

            .modal
            {
                margin:5px 0px;
                padding:5px;
                border-radius:5px;
            }
            
            .success
            {
                color:#468847;
                background-color:#dff0d8;
                border:1px solid #d6e9c6;
            }
            
            .error
            {
                color:#b94a48;
                background-color:#f2dede;
                border:1px solid #eed3d7;
            }
            
            .warning
            {
                color:#3a87ad;
                background-color:#d9edf7;
                border:1px solid #bce8f1;
            }


        </style>
    </head>
    <body>

        <h1>Voeg een brouwer toe</h1>

        <?php if ( $message ): ?>
            <div class="modal <?= $message[ 'type' ] ?>">
                <?= $message[ 'text' ] ?>
            </div>
        <?php endif ?>

        <form action="<?= BASE_URL ?>" method="POST">
            <ul>
                <li>
                    <label for="brouwernaam">Brouwernaam</label>
                    <input type="text" id="brouwernaam" name="brnaam" value="Pascal">
                </li>
                <li>
                    <label for="adres">adres</label>
                    <input type="text" id="adres" name="adres" value="Test">
                </li>
                <li>
                    <label for="postcode">postcode</label>
                    <input type="text" id="postcode" name="postcode" value="2800">
                </li>
                <li>
                    <label for="gemeente">gemeente</label>
                    <input type="text" id="gemeente" name="gemeente" value="Mechelen">
                </li>
                <li>
                    <label for="omzet">omzet</label>
                    <input type="text" id="omzet" name="omzet" value="1000">
                </li>
            </ul>
            <input type="submit" name="submit">
        </form>

        
    </body>
</html>