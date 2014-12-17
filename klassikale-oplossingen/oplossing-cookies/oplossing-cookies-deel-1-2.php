<?php

	$filename		=	'users-csv.txt';
	$loggedIn		=	false;
	$loginError		=	false;
	$expirationTime	=	3600;

	$inputUsername	=	false;
	$inputPassword	=	false;

	if ( isset( $_COOKIE[ 'loggedIn' ] ) )
	{
		$loggedIn	=	true;
	}

	if ( isset( $_POST[ 'submit' ] ) )
	{
		$inputUsername	=	$_POST[ 'username' ];
		$inputPassword	=	$_POST[ 'password' ];

		if ( isset( $_POST[ 'rememberMe' ] ) )
		{
			$expirationTime	=	60 * 60 * 24 * 30;
		}

		$fileContent	=	file_get_contents( $filename );

		$users	=	explode( ',', $fileContent );

		if ( $users[ 0 ] === $inputUsername &&
			$users[ 1 ] === $inputPassword )
		{
			setcookie( 'loggedIn', true, time() + $expirationTime);
			relocate( $_SERVER[ 'PHP_SELF' ] );
		}
		else
		{
			$loginError	=	true;
		}
	}

	function relocate( $page )
	{
		header( 'location: ' . $page );
	}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing cookies</title>
    </head>
    <body>

    	<h1>Oplossing cookies</h1>

		<?php if ( $loggedIn): ?>
	
			<p>U bent ingelogd!</p>

		<?php else: ?>

			<?php if ( $loginError === true ): ?>
				<p>Er ging iets mis bij het inloggen. Probeer opnieuw.</p>
			<?php endif ?>

	    	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
				
				<ul>
					<li>
						<label for="username">Gebruikersnaam:</label>
						<input type="text" name="username" id="username" value="<?= ( $inputUsername !== false ) ? $inputUsername : 'pascal' ?>">
					</li>
					<li>
						<label for="password">Paswoord:</label>
						<input type="password" name="password" id="password" value="<?= ( $inputPassword !== false ) ? $inputPassword : 'paswoord01' ?>">
					</li>
					<li>
						<input type="checkbox" name="rememberMe" id="rememberMe">
						<label for="rememberMe">onthoud mij</label>
					</li>
				</ul>

				<input type="submit" name="submit">

	    	</form>

		<?php endif ?>
		
        
    </body>
</html>