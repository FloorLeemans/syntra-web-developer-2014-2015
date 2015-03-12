<?php

    session_start();

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );

    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken

    $deleteConfirm      =   false;
    $deleteBrouwerId    =   false;
    $editFormBrouwerId      =   false;

    $message    =   false;

    if ( isset($_POST[ 'deleteConfirm' ] ) )
    {
        $deleteBrouwerId    =   $_POST['deleteConfirm'];
        $deleteConfirm      =   true;
    }

    if ( isset( $_POST[ 'delete' ] ) )
    {
        $deleteBrouwerId    =   $_POST['delete'];

        $deleteQueryString    =   'DELETE FROM brouwers
                                    WHERE brouwernr = :brouwernr
                                    LIMIT 1';

        $deleteStatement    =   $db->prepare( $deleteQueryString );

        $deleteStatement->bindValue(':brouwernr', $deleteBrouwerId );

        $deleteStatement->execute();
    }

    if ( isset( $_POST[ 'editForm' ] )  )
    {
        $editFormBrouwerId  =   $_POST[ 'editForm' ];



        $editFormBrouwerString   =   'SELECT *
                                    FROM brouwers
                                    WHERE brouwernr = :brouwernr';

        $editFormBrouwerStatement   =   $db->prepare( $editFormBrouwerString );

        $editFormBrouwerStatement->bindValue( ':brouwernr', $editFormBrouwerId );

        $editFormBrouwerStatement->execute();

        $editFormBrouwerResultaat =   array();

        // Resultaten
        while( $row = $editFormBrouwerStatement->fetch( PDO::FETCH_ASSOC )  )
        {
            $editFormBrouwerResultaat[]   =   $row;
        }

        $editFormBrouwerResultaat   =   $editFormBrouwerResultaat[0];

        // Haal de ID-key uit de array zodat deze kan geloopt worden in de HTML zonder dat het ID editbaar is
        array_shift( $editFormBrouwerResultaat );
    }

    if ( isset( $_POST[ 'edit' ] ) )
    {
        $editBrouwerId  =   $_POST[ 'brouwernr' ];

        $editBrouwerString  =   'UPDATE brouwers
                                    SET brnaam = :brnaam,
                                            adres = :adres,
                                            postcode = :postcode,
                                            gemeente = :gemeente,
                                            omzet = :omzet
                                    WHERE brouwernr = :brouwernr';

        $editBrouwerStatement   =   $db->prepare( $editBrouwerString );

        $editBrouwerStatement->bindValue( ':brnaam' , $_POST[ 'brnaam' ] );
        $editBrouwerStatement->bindValue( ':adres' , $_POST[ 'adres' ] );
        $editBrouwerStatement->bindValue( ':postcode' , $_POST[ 'postcode' ] );
        $editBrouwerStatement->bindValue( ':gemeente' , $_POST[ 'gemeente' ] );
        $editBrouwerStatement->bindValue( ':omzet' , $_POST[ 'omzet' ] );

        $editBrouwerStatement->bindValue( ':brouwernr' , $editBrouwerId );

        $editBrouwerStatement->execute();

        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'De brouwer ' . $_POST[ 'brnaam' ] . ' met id ' . $_POST[ 'brouwernr' ] . ' is succesvol aangepast';
    }


    // Query string
    $queryString    =   'SELECT *
                            FROM brouwers';

    $statement  =   $db->prepare( $queryString );

    $statement->execute();

    $resultaten =   array();

    // Resultaten
    while( $row = $statement->fetch( PDO::FETCH_ASSOC )  )
    {
        $resultaten[]   =   $row;
    }

    // Kolomnamen
    $kolomnamen = array_keys( $resultaten[0] );

    
    if ( isset( $_SESSION[ 'message' ] ) )
    {
        $message = $_SESSION[ 'message' ];
        unset( $_SESSION[ 'message' ] );
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing CRUD - delete</title>
        <style>
            html
            {
                font-family:sans-serif;
            }
            table
            {
                font-size:12px;
                overflow:auto;
                border-collapse: collapse;
            }

            table th,
            table td
            {
                padding:4px;
            }

            table th
            {
                background: #DFDFDF;
                text-align:center;
            }

            table tr
            {
                transition: all 0.2s ease-out;
            }

            table tr:hover
            {
                background-color:lightgreen;
            }

            .odd
            {
                background: #F1F1F1;
            }

            .deletion
            {
                color: #b94a48;
                background-color: #f2dede;
            }

            .input-icon-button
            {
                border: none;
                background-color:transparent;
                cursor:pointer;
                text-indent:-1000px;
                width:16px;
                height:16px;
            }

            .delete
            {
                background: url("http://web-backend.local/img/icon-delete.png") no-repeat;
            }

            .edit
            {
                background: url("http://web-backend.local/img/icon-edit.png") no-repeat;
            }

            .deleteHighlight
            {
                color: #b94a48;
                background-color: #f2dede;
                border: 1px solid #eed3d7;
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

    <?php if ( $message ): ?>
        <div class="modal <?= $message['type'] ?>">
            <?= $message['text'] ?>
        </div>
    <?php endif ?>

        <?php if ( $deleteConfirm ): ?>
            <div class="modal warning">
                
                <p>Bent u zeker dat u deze brouwer met id <?= $deleteeditBrouwerId ?> wilt verwijderen?</p>
                
                <form action="<?= BASE_URL ?>" method="POST">
                    
                    <button>Ongedaan maken</button>
                    <button name="delete" value="<?= $deleteBrouwerId ?>">Verwijder</button>

                </form>
            </div>
        <?php endif ?>

        <?php if ( $editFormBrouwerId ): ?>

            <form action="<?= BASE_URL ?>" method="POST">

                <ul>
                    
                    <?php foreach ($editFormBrouwerResultaat as $kolomnaam => $value): ?>
                        
                        <li>
                            <label for="<?= $kolomnaam ?>"><?= $kolomnaam ?></label>
                            <input type="text" value="<?= $value ?>" name="<?= $kolomnaam ?>" id="<?= $kolomnaam ?>">
                        </li>

                    <?php endforeach ?>

                </ul>

                <input type="hidden" name="brouwernr" value="<?= $editFormBrouwerId ?>">

                <input type="submit" name="edit">
            </form>
            
        <?php endif ?>

        <form action="<?= BASE_URL ?>" method="POST">

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <?php foreach ($kolomnamen as $kolomnaam): ?>
                            <th><?= $kolomnaam ?></th>
                        <?php endforeach ?>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($resultaten as $nummer => $resultaat): ?>
                        <tr class="<?=  ( ($nummer+1) % 2 !== 0 ) ? 'odd' : '' ?> <?= ( $deleteConfirm !== false && $deleteBrouwerId === $resultaat['brouwernr'] ) ? 'deleteHighlight' :'' ?>  ">
                            <td><?= ( $nummer + 1 ) ?></td>
                            <?php foreach ($resultaat as $kolomValue): ?>
                                <td><?= $kolomValue ?></td>
                            <?php endforeach ?>
                            <td><button class="input-icon-button delete" name="deleteConfirm" value="<?= $resultaat['brouwernr'] ?>"></button></td>
                            <td><button class="input-icon-button edit" name="editForm" value="<?= $resultaat['brouwernr'] ?>"></button></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        
        </form>
    </body>
</html>