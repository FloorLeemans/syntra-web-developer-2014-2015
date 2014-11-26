<?php
   
    $maxTafel   =   10;
    $maxProduct =   10;

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

        <table>

            <?php for($rij = 0; $rij <= $maxTafel; ++$rij): ?>
                
                <tr>
                    <?php for($kolom = 0; $kolom <= $maxProduct; ++$kolom): ?>

                        <td><?= $rij * $kolom ?></td>

                    <?php endfor ?>
                </tr>

            <?php endfor ?>

        </table>

    </body>
</html>