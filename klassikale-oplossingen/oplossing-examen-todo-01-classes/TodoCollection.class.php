<?php

	class TodoCollection
	{
		private $collection;

		// Voeg een TODO toe aan de collectie
		public function add( $item )
		{
			$this->collection[ ] =	$item;
		}

		// Controleert of de collection leeg is
		public function isEmpty()
		{
			$isEmpty = empty( $this->collection );

			return $isEmpty;
		}

		// Zoekt naar een bepaalde waarde die overeenstemt met $key en kijkt of die waarde gelijk is aan de parameter $value
		// Returnt een array met de resultaten, of false wanneer niets gevonden werd.
		public function query( $key, $value )
		{
			$result	=	array();

			// Kan enkel uitgevoerd worden wanneer de collectie niet leeg is
			if ( !$this->isEmpty() )
			{

				// Zet de $key string om naar de juiste methodenaam
				// bv. status -> getStatus
				$getterString	=	'get' . ucfirst( $key );
				
				// Overloop de hele collection en controleer of de key-value gelijk is aan de parameter $value
				foreach( $this->collection as $item )
				{
					// Voer deze getterstring (bv. getStatus ) uit
					if ( $item->$getterString() === $value )
					{
						// Voeg het item toe aan de result-array
						$result[]	=	$item;
					}
				}
			}


			// Wanneer er geen resultaten werden gevonden (array is leeg), zet de waarde van resultaat dan op false
			$result = empty( $result ) ? false : $result;

			// Return de array met resultaten
			return $result;
		}

		public function toggle( $id )
		{
			// Haal Todo op met het opgegeven ID
			$itemArray 	= 	$this->query( 'id', $id );

			// Let op, query returnt een array, dus op de 0-de key staat het item dat je nodig hebt
			$item		=	$itemArray[0];

			// Haal id en status van todo op en verander deze
			$status = 	$item->getStatus();

			// Verander de status naar het omgekeerde
			if( $status  === 'done' )
			{
				$item->setStatus( 'todo' );
			}
			else
			{
				$item->setStatus( 'done' );
			}		
		}

		public function delete( $id )
		{
			// Haal Todo op met het opgegeven ID
			$itemArray 	= 	$this->query( 'id', $id );

			// Let op, query returnt een array, dus op de 0-de key staat het item dat je nodig hebt
			$item		=	$itemArray[0];

			// Zoek naar de key van het item in de collectie
			$collectionId	=	array_search( $item, $this->collection );

			// Verwijder het item uit de collection
			unset( $this->collection[ $collectionId ] );

			// Verwijder het item uit de session (via Todo class)
			$item->delete();		
		}
	}

?>