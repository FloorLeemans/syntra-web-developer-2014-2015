<?php

	session_start();


	$filename		=	'users-json.txt';
	$loggedIn		=	false;
	$loginError		=	false;
	$expirationTime	=	3600;

	$inputUsername	=	false;
	$inputPassword	=	false;

	$username		=	( isset( $_SESSION[ 'username' ] ) ) ? $_SESSION[ 'username' ] : false ;

	if ( isset( $_GET[ 'logOut' ] ) )
	{
		setcookie( 'loggedIn', '', time() - 1000 );
		relocate( $_SERVER[ 'PHP_SELF' ] );
	}

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

		var_dump( $fileContent );

		$users	=	json_decode( $fileContent, 1 );

		var_dump( $users );

		foreach( $users as $user )
		{
			if ( $user['username'] === $inputUsername &&
				 $user['password'] === $inputPassword )
			{
				$_SESSION[ 'username' ]	=	$inputUsername;

				setcookie( 'loggedIn', true, time() + $expirationTime);
				relocate( $_SERVER[ 'PHP_SELF' ] );
				break;
			}	
		}
		
		$loginError	=	true;
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
	
			<p>Hallo <?= $username ?>, welkom terug</p>

			<a href="<?= $_SERVER['PHP_SELF'] ?>?logOut=true">Uitloggen</a>

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