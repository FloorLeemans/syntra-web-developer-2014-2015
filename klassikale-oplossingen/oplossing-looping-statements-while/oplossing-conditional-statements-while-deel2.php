<?php
   
    $maxRijen           =   10;
    $rijenTeller        =   0;

    $maxKolommen        =   10;
    $kolommenTeller     =   0;

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

        <table>

            <?php while ( $rijenTeller < $maxRijen ): ?>

                <?php $kolommenTeller = 0 ?>

                <tr>
                    <?php while ( $kolommenTeller < $maxKolommen ): ?>

                        <td><?= $rijenTeller * $kolommenTeller ?></td>

                        <?php ++$kolommenTeller ?>

                    <?php endwhile ?>
                </tr>

                <?php ++$rijenTeller ?>

            <?php endwhile ?>

        </table>
        
        
    </body>
</html>