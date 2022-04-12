 <?php
include('Race.php');
include('Car.php');
include('Track.php');
include('RaceResult.php');
include('RoundResult.php');

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

// run a race and print the results
$test = new Race;
 $results = $test->runRace();
 print_r($results->getRoundResults());

//winner detection
$winners = [];
$endPos = end($results->getRoundResults())->carsPosition;
$max = max($endPos);
for($i = 0; $i < count($endPos); $i++)
{
	if($endPos[$i] == $max)
	{
		array_push($winners, $i);
	}
}

if (count($winners) > 1)
{
	print_r("<br>Draw between Cars ");
	for ($x = 0; $x < count($winners); $x++)
	{
		print_r($winners[$x] . " ");
	}
}
else
{
	print_r("<br>Car ". $winners[0] . " Wins!");
}
