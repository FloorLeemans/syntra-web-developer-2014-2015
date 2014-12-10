<?php

	$usernameInput	=	'';
	$passwordInput	=	'';

	$username	=	'stijn';
	$password	=	'azerty';

	$isLoggedIn	=	false;
	$message	=	false;

	if ( isset( $_POST[ 'submit' ] ) )
	{
		$usernameInput	=	$_POST[ 'username' ];
		$passwordInput	=	$_POST[ 'password' ];

		if ( $username == $usernameInput &&
				$password == $passwordInput )
		{
			$isLoggedIn	=	true;
		}
		else
		{
			$message	=	'Er ging iets mis bij het inloggen, probeer opnieuw';
		}
	}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing POST</title>
    </head>
    <body>

	<h1>Oplossing post</h1>

		<?php if ( $isLoggedIn ): ?>

			<p>Welkom!</p>
		
		<?php else: ?>

			<?php if ( $message ): ?>
				
				<p><?= $message ?></p>

			<?php endif ?>

			<form action="<?= $_SERVER[ 'PHP_SELF' ] ?>" method="POST">
	            <ul>
	                <li>
	                    <label for="username">gebruikersnaam</label>
	                    <input type="text" id="username" name="username" value="<?= $usernameInput?>">
	                </li>	
	                <li>
	                    <label for="password">paswoord</label>
	                    <input type="text" id="password" name="password" value="<?= $passwordInput ?>">
	                </li>
	            </ul>
	            <input type="submit" name="submit">
        	</form>

		<?php endif ?>

    </body>
</html>