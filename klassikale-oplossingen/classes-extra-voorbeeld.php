<?php
  
  	// Stap 1
	$leonie	=	array('naam' => 'Leonie',
						'punten' => 10);

	++$leonie['punten'];

	$floor	=	array('naam' => 'Floor',
						'punten' => 10);

	++$floor['punten'];


	var_dump( $leonie );
	var_dump( $floor );

	// Stap 2
	/*$leonie	=	array('naam' => 'Leonie',
						'punten' => 10);

	$leonie = voegPuntenToe( 1, $leonie );

	$floor	=	array('naam' => 'Floor',
						'punten' => 10);

	$floor = voegPuntenToe( 1, $floor);


	function voegPuntenToe( $punten, $array  )
	{
		$array['punten']	+= $punten;

		return $array;
	}

	function helftVanDePunten( $array  )
	{
		$helft = $array['punten']	/ 2;

		return $helft;
	}

	var_dump( $leonie );
	var_dump( $floor );*/

	// Stap 3
	/*$leonie	=	new Student( 'Leonie', 10 );
	$floor	=	new Student( 'Floor', 10 );

	$leonie->voegPuntenToe( 5 );
	$floor->voegPuntenToe( 1 );

	class Student
	{
		private $naam	=	'';
		private $punten	=	'';

		public function __construct( $naam, $punten )
		{
			$this->naam		=	$naam;
			$this->punten	=	$punten;
		}

		public function voegPuntenToe( $punten )
		{
			$this->punten	+= $punten;

			return $this->punten;
		}

		public function helftVanDePunten( )
		{
			$helft = $this->punten	/ 2;

			return $helft;
		}
	}*/

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>

        <style>
        	.group:after 
        	{
			  content: "";
			  display: table;
			  clear: both;
			}

        	body
        	{
        		margin:0px;
        	}

			nav
			{
				background-color:grey;
			}

			nav h1
			{
				float:left;
			}

			nav ul
			{
				float: right;
			}

			nav ul li
			{
				display:inline-block;
				background-color:white;
				padding:6px;
				margin: 6px;
			}
        </style>
    </head>
    <body>
 
    	

    </body>
</html>