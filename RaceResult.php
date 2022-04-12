<?php

class RaceResult
{
    /**
     * @var array of StepResult
     */
    private $roundResults = [];

    public function getRoundResults(): array
    {
        return $this->roundResults;
    }

//Function added to add roundResults to the RaceResult Object
    public function addRoundResult(RoundResult $StepResult)
	{
		array_push($this->roundResults , $StepResult);
	}
}

