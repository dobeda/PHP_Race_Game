<?php
//FILE		: Car.php
//PROJECT	: The PHP Race Game
//PROGRAMMER	: David Obeda
//LAST UPDATED	: April 11th 2022
//DESCRIPTION	: Car Oject for the Race Game

class Car
{
	public $speed;

	const SPEED_SUM = 22;
	const SPEED_MIN = 4;

	public function __construct()
	{
		$speed = [];
		srand();
		array_push($speed, rand(self::SPEED_MIN, (self::SPEED_SUM - self::SPEED_MIN)));
		array_push($speed, self::SPEED_SUM - $speed[0]);
		$this->speed = $speed;
	}
}

?>
