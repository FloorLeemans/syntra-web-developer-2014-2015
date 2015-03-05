<?php

	session_start();

	// Maak de sessie leeg
	if ( isset( $_GET[ 'action' ] ) )
	{
		if ( $_GET[ 'action' ] === 'session_destroy' )
		{
			session_destroy();

			session_start();
		}
	}

	define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );

	$message	=	false;

	// Voeg todo toe
	if ( isset( $_POST['submit'] ) )
	{
		$todoItem 	=	$_POST['todo'];
		$todoItem	=	trim( $todoItem );

		if ( !empty( $todoItem ) )
		{
			$_SESSION['todos'][]	=	array( 'text' => $todoItem,
												'status' => 'todo' );
		}
		else
		{
			$message['type']	=	'error';
			$message['text']	=	'Het todo-item mag niet leeg zijn.';
		}
	}

	// Verander todo van status
	if ( isset( $_POST[ 'toggle' ] ) )
	{
		$id 	=	$_POST[ 'id' ];
		
		$_SESSION[ 'todos' ][ $id ][ 'status' ] = ( $_SESSION[ 'todos' ][ $id ][ 'status' ] === 'done' ) ? 'todo' : 'done';
	}

	// Verwijder todo
	if ( isset( $_POST[ 'delete' ] ) )
	{
		$id 	=	$_POST[ 'id' ];
		
		unset( $_SESSION[ 'todos' ][ $id ] );
	}

	// Maak een onderscheid tussen todo en done items
	$todos		=	( isset( $_SESSION['todos'] ) ) ? $_SESSION['todos'] : false ;

	$todoArray	=	false;
	$doneArray	=	false;

	if ( $todos )
	{
		foreach( $todos as $id => $todo )
		{
			$todo['id']	=	$id;

			if ( $todo['status'] === 'todo' )
			{
				$todoArray[]	=	$todo;
			}
			else
			{
				$doneArray[]	=	$todo;
			}
		}
	}

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing examen TODO 01</title>
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

    	<?php if ( $message ): ?>

    		<div class="modal <?= $message['type'] ?>">
				<?= $message['text'] ?>
    		</div>
    		
    	<?php endif ?>
        
        <form action="<?= BASE_URL ?>" method="POST">
        	
        	<label for="todo">Voeg todo toe</label>
        	<input type="text" name="todo" id="todo">

        	<input type="submit" name="submit">

			<a href="<?= BASE_URL ?>?action=session_destroy">Verwijder sessie</a>
        </form>

        <?php if ( $todos ): ?>
     
			<h1>Todos</h1>      

			<h2>Todo</h2>
			
			<?php if ( $todoArray ): ?>
				
				<ul>

					<?php foreach ($todoArray as $todo): ?>
						<li>
							<form action="<?= BASE_URL ?>" method="POST">
								
								<input type="hidden" name="id" value="<?= $todo['id'] ?>">
								<button name="toggle">toggle</button>

								<?= $todo[ 'text' ] ?>

								<button name="delete">delete</button>
							</form>
						</li>
					<?php endforeach ?>
					
				</ul>

			<?php else: ?>

				<p>Alles gedaan!</p>
				
			<?php endif ?>

			
			<h2>Done</h2>
			
			<?php if ( $doneArray ): ?>
				
				<ul>

					<?php foreach ($doneArray as $todo): ?>
						<li>
							
							<form action="<?= BASE_URL ?>" method="POST">
								
								<input type="hidden" name="id" value="<?= $todo['id'] ?>">
								<button name="toggle">toggle</button>

								<?= $todo[ 'text' ] ?>

								<button name="delete">delete</button>

							</form>

						</li>
						
						
					<?php endforeach ?>

				</ul>

			<?php else: ?>

				<p>Werk aan de winkel!</p>

			<?php endif ?>
	        

        <?php endif ?>


	

    </body>
</html>