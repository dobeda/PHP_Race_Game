<?php
//FILE		: Race.php
//PROJECT	: The PHP Race Game
//PROGRAMMER	: David Obeda
//LAST UPDATED	: April 11th 2022
//DESCRIPTION	: Handles Running the race and going through each round / step

class Race
{

	const CAR_COUNT = 5;
    public function runRace(): RaceResult
    {
	$RaceTrack = new Track;
	$CarArray = [];
	$CarPositions = [];
	$Step = 0;
	$Results = new RaceResult;
	$Finished = False;
	$i = 0;
	//Initialize starting positions to 0
	for ($i = 0; $i < self::CAR_COUNT; $i++)
		{
			array_push($CarArray, new Car);
			array_push($CarPositions, 0);
		}

	//start race
	$round = new RoundResult($Step, $CarPositions);
	$Results->addRoundResult($round);

	//Race
	while($Finished == False )
	{
		$Step++;
		$CarPositions = $this->stepRound($CarArray, $CarPositions, $RaceTrack);
		$round = new RoundResult($Step, $CarPositions);
		$Results->addRoundResult($round);

		//Check if Race is Done
		foreach ($CarPositions as $Pos)
		{
			if($Pos >= (count($RaceTrack->segment) - 1))
			{
				$Finished = True;
			}
		}
	}

        return $Results;
    }

	public function  stepRound(array $cars, array $positions, Track $track): array
	{
		$i = 0;
		foreach ($cars as $car)
		{
			//print_r($track);
			$speed = $car->speed[$track->segment[$positions[$i]]];

			while($speed > 0)
			{
				//check if car is at finish
				if ($positions[$i] >= (count($track->segment) - 1))
				{
					$speed = 0;
				}
				else
				{
					//Advance current car position and reduce speed(steps) for round
					$positions[$i]++;
					$speed--;

					//check if track type changed

					if($track->segment[$positions[$i]] != $track->segment[$positions[$i] - 1])
					{
						$speed = 0;
					}
				}
			}
			$i++;
		}
		return $positions;
	}

}

