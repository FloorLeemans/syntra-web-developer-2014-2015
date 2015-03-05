<?php

	class Todo
	{
		public $id;
		public $text;
		public $status;

		public function __construct( $id, $text, $status)
		{
			$this->id		=	$id;
			$this->text 	= 	$text;
			$this->status 	= 	$status;

			// Wanneer de Todo nog niet bestaat in de sessie, moet deze als 'new' aanschouwd worden
			// Dit heeft als gevolg dat bepaald moet worden welke ID deze todo moet krijgen (= de sizeof van de $_SESSION['todo'])
			// en dat deze moet toegevoegd worden aan de sessie
			// Als de TODO al bestaat, moet er gewoon een instantie van deze todo gemaakt worden 
			if ( $id === 'new' )
			{
				// Controleer of de $_SESSION['todo'] al bestaat, zoniet zet de key op 0
				// Bestaat deze wel, tel dan hoeveel waarden er reeds in zitten. Dit wordt het nummer voor het id van de nieuwe todo
				$this->id	=	isset( $_SESSION[ 'todos' ] ) ? sizeof( $_SESSION[ 'todos' ] ) : 0;
			
				// Voeg todo toe aan de $_SESSION['todos'] met het nieuwe ID als key
				$_SESSION[ 'todos' ] [ $this->id ]	=	array( 'text' => $text,
													'status' => $status );
			}
		}

		public function getId()
		{
			return $this->id;
		}

		public function getText()
		{
			return $this->text;
		}

		public function getStatus()
		{
			return $this->status;
		}

		public function setStatus( $value )
		{
			$this->status = $value;

			// Verander de waarde in de session
			$_SESSION['todos'][ $this->id ][ 'status' ] = $this->status;
		}

		// Delete de todo
		public function delete(  )
		{
			unset( $_SESSION['todos'][ $this->id ] );
		}
	}

?>