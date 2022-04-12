<?php
//FILE		: Track.php
//PROJECT	: The PHP Race Game
//PROGRAMMER	: David Obeda
//LAST UPDATED	: April 11th 2022
//DESCRIPTION	: Contains details for creating a track for the PHP race game

class Track
{
	public $segment;

	const CONSECUTIVE_SEGMENTS_OF_SAME_TYPE = 40;
	const TYPE_COUNT = 2;
	const LENGTH = 2000;

	public function __construct()
	{
		srand();
		$segment = [];
		for ($i = 0; $i < (self::LENGTH / self::CONSECUTIVE_SEGMENTS_OF_SAME_TYPE); $i++)
		{
			$segment = array_merge($segment, array_fill( 0, self::CONSECUTIVE_SEGMENTS_OF_SAME_TYPE, rand(0, (self::TYPE_COUNT - 1))));
			//echo "$i : ";
			//print_r($segment[(($i + 1) * 40) - 1]);
			//echo "<br>";
		}
		$this->segment = $segment;
		//print_r($segment);

	}
}

?>
