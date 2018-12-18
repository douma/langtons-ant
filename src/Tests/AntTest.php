<?php

use PHPUnit\Framework\TestCase;
use LangtonsAnt\Contracts\PositionInterface;
use LangtonsAnt\ValueObjects\Position;

final class AntTest extends TestCase
{
    /**
     * @var $sut \LangtonsAnt\Ant
     */
    private $sut;

    public function setUp()
    {
        $this->sut = new \LangtonsAnt\Ant(new Position(0,0), new \LangtonsAnt\ValueObjects\TurnDegree(0));
    }

    public function test_move_left_4_times_should_be_one_rotation()
    {
        $this->sut->forwardLeft();
        $this->sut->forwardLeft();
        $this->sut->forwardLeft();
        $this->sut->forwardLeft();

        $history = $this->sut->getEventHistory();
        $this->assertEquals(new Position(0, 0), $history[0]);
        $this->assertEquals(new Position(-1, 0), $history[1]);
        $this->assertEquals(new Position(-1, -1), $history[2]);
        $this->assertEquals(new Position(0, -1), $history[3]);
        $this->assertEquals(new Position(0,0), $history[4]);
    }

    public function test_move_right_4_times_should_be_one_rotation()
    {
        $this->sut->forwardRight();
        $this->sut->forwardRight();
        $this->sut->forwardRight();
        $this->sut->forwardRight();

        $history = $this->sut->getEventHistory();
        $this->assertEquals(new Position(0, 0), $history[0]);
        $this->assertEquals(new Position(1, 0), $history[1]);
        $this->assertEquals(new Position(1, -1), $history[2]);
        $this->assertEquals(new Position(0, -1), $history[3]);
        $this->assertEquals(new Position(0,0), $history[4]);
    }
}
