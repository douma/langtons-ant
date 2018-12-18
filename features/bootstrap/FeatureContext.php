<?php

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use LangtonsAnt\ValueObjects\TurnDegree;

use LangtonsAnt\{Ant, Board};
use LangtonsAnt\ValueObjects\Position;
use LangtonsAnt\Contracts\BoardInterface;

class FeatureContext extends BehatContext
{
    public $direction, $tile;
    public $ant, $board, $startAt = [0,0];

    private $degreeMap = [
        'north'=>0,
        'east'=>90,
        'south'=>180,
        'west'=>270
    ];

    /**
     * @Given /^I am facing "([^"]*)"$/
     */
    public function iAmFacing($arg1)
    {
        $this->direction = $arg1;
    }

    /**
     * @Given /^I start at (\d+),(\d+)$/
     */
    public function iStartAt($arg1, $arg2)
    {
        $this->startAt = [$arg1, $arg2];
    }

    /**
     * @When /^I move (\d+) times$/
     */
    public function iMoveTimes($arg1)
    {
        $ant = new Ant(new Position($this->startAt[0],$this->startAt[1]), new \LangtonsAnt\ValueObjects\TurnDegree($this->degreeMap[$this->direction]));
        $board = new Board($ant);

        $this->ant = $ant;
        $this->board = $board;

        for($x = 0; $x<$arg1;$x++)
        {
            $this->board->moveAnt();
        }
    }

    /**
     * @Then /^I should be facing "([^"]*)"$/
     */
    public function iShouldBeFacing($arg1)
    {
        $degreeInt = $this->degreeMap[$arg1];
        $degree = $this->ant->getCurrentDegree();

        if(!$degree->sameAs(new TurnDegree($degreeInt)))
        {
            throw new \LogicException("Invalid end direction, expected " . $arg1);
        }
    }

    /**
     * @Then /^the tile (\d+),(\d+) should be "([^"]*)"$/
     */
    public function theTileShouldBe($arg1, $arg2, $arg3)
    {
        $markedPositions = $this->board->getMarkedPositions();
        $markedPositionsMap = [];
        $key = "[{$arg1},{$arg2}]";
        foreach($markedPositions as $position)
        {
            $markedPositionsMap[(string) $position] = $position;
        }

        if($arg3 == "marked")
        {
            if(!isset($markedPositionsMap[$key]))
            {
                throw new \LogicException("Expect " . $key . " to be marked");
            }
        }
        else 
        {
            if(isset($markedPositionsMap[$key]))
            {
                throw new \LogicException("Expect " . $key . " to not be marked");
            }
        }
    }
}
