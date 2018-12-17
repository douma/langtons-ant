<?php

use PHPUnit\Framework\TestCase;
use LangtonsAnt\Contracts\{BoardInterface, AntInterface, PositionInterface};

final class BoardTest extends TestCase
{
    /**
     * @var $sut \LangtonsAnt\Board
     */
    private $sut;

    public function setUp()
    {
        $this->sut = new \LangtonsAnt\Board(new \LangtonsAnt\Ant(new \LangtonsAnt\ImmutablePosition(0,0),0));
    }

    public function test_move_5_times_only_3_positions_marked()
    {
        $count = 0;
        while($count !== 5)
        {
            $this->sut->moveAnt();
            $count++;
        }

        $marked = $this->sut->getMarkedPositions();
        $this->assertEquals(new \LangtonsAnt\ImmutablePosition(1,0), $marked[0]);
        $this->assertEquals(new \LangtonsAnt\ImmutablePosition(1,-1), $marked[1]);
        $this->assertEquals(new \LangtonsAnt\ImmutablePosition(0,-1), $marked[2]);
    }
}
