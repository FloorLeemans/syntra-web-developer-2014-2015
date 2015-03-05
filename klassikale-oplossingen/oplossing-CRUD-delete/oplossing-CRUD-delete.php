<?php

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );

    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', ''); // Connectie maken

    $deleteConfirm      =   false;
    $deleteBrouwerId    =   false;

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

        <?php if ( $deleteConfirm ): ?>
            <div class="modal warning">
                
                <p>Bent u zeker dat u deze brouwer met id <?= $deleteBrouwerId ?> wilt verwijderen?</p>
                
                <form action="<?= BASE_URL ?>" method="POST">
                    
                    <button>Ongedaan maken</button>
                    <button name="delete" value="<?= $deleteBrouwerId ?>">Verwijder</button>

                </form>
            </div>
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
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        
        </form>
    </body>
</html>