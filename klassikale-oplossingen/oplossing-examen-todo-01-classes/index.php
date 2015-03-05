<?php

	include_once( 'Todo.class.php' );
	include_once( 'TodoCollection.class.php' );

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

	// Globale variabele
	$message	=	false;

	$todosFromSession	=	( isset ( $_SESSION['todos'] ) ) ? $_SESSION['todos'] : false;

	$todoCollection = new TodoCollection();

	// Haal TODOs uit de Sessie en steek deze in de collection
	if ( $todosFromSession )
	{
		// Voeg todo items toe aan de collection
		foreach( $todosFromSession as $id => $todo )
		{
			$todoInstance	=	new Todo( $id, $todo['text'], $todo['status'] );
			
			$todoCollection->add( $todoInstance );
		}
	}

	// Voeg todo toe
	if ( isset( $_POST['submit'] ) )
	{
		// Bewerk de tekst tot het juiste formaat
		$todoItem 	=	$_POST['todo'];
		$todoItem	=	trim( $todoItem );

		// Controleer of de string leeg is
		if ( !empty( $todoItem ) )
		{
			// Haal het toekomstige ID van de nieuwe TODO op door te tellen hoeveel todos er al in de $_SESSION['todo'] staan
			// 'new' wordt geïnterpreteerd als het aanmaken van deze todo in de sessie
			$todoInstance	=	new Todo( 'new', $todoItem, 'todo');

			$todoCollection->add( $todoInstance );
		}
		else // Toon een foutboodschap wanneer de string leeg is
		{
			$message['type']	=	'error';
			$message['text']	=	'Het todo-item mag niet leeg zijn.';
		}
	}

	// Verander todo van status
	if ( isset( $_POST[ 'toggle' ] ) )
	{
		// Zet de waarde om naar een numerieke waarde.
		// Belangrijk als je met === werkt ipv ==
		$id 	=	intval( $_POST[ 'id' ] );

		$todoCollection->toggle( $id );
	}

	// Verwijder todo
	if ( isset( $_POST[ 'delete' ] ) )
	{
		// Zet de waarde om naar een numerieke waarde.
		// Belangrijk als je met === werkt ipv ==
		$id 	=	intval( $_POST[ 'id' ] );

		$todoCollection->delete( $id );
	}

	// Maak een onderscheid tussen todo en done items
	$todoArray = $todoCollection->query( 'status', 'todo' );
	$doneArray = $todoCollection->query( 'status', 'done' );
	
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

		
        <?php if ( !$todoCollection->isEmpty() ): ?>
     
			<h1>Todos</h1>      

			<h2>Todo</h2>
			
			<?php if ( $todoArray ): ?>
				
				<ul>

					<?php foreach ($todoArray as $todo): ?>
						<li>
							<form action="<?= BASE_URL ?>" method="POST">
								
								<input type="hidden" name="id" value="<?= $todo->getId() ?>">
								<button name="toggle">toggle</button>

								<?= $todo->getText() ?>

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
								
								<input type="hidden" name="id" value="<?= $todo->getId() ?>">
								<button name="toggle">toggle</button>

								<?= $todo->getText() ?>

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