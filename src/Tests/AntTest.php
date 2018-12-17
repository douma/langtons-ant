<?php

use PHPUnit\Framework\TestCase;
use LangtonsAnt\Contracts\PositionInterface;
use LangtonsAnt\ImmutablePosition;

final class AntTest extends TestCase
{
    /**
     * @var $sut \LangtonsAnt\Ant
     */
    private $sut;

    public function setUp()
    {
        $this->sut = new \LangtonsAnt\Ant(new ImmutablePosition(0,0), 0);
    }

    /**
     * @expectedException LogicException
     */
    public function test_should_throw_logicException_on_invalid_degrees()
    {
        new \LangtonsAnt\Ant(new ImmutablePosition(0,0), 50);
    }

    public function test_move_left_4_times_should_be_one_rotation()
    {
        $this->sut->moveLeft();
        $this->sut->moveLeft();
        $this->sut->moveLeft();
        $this->sut->moveLeft();

        $history = $this->sut->getEventHistory();
        $this->assertEquals(new ImmutablePosition(-1, 0), $history[0]);
        $this->assertEquals(new ImmutablePosition(-1, -1), $history[1]);
        $this->assertEquals(new ImmutablePosition(0, -1), $history[2]);
        $this->assertEquals(new ImmutablePosition(0,0), $history[3]);
    }

    public function test_move_right_4_times_should_be_one_rotation()
    {
        $this->sut->moveRight();
        $this->sut->moveRight();
        $this->sut->moveRight();
        $this->sut->moveRight();

        $history = $this->sut->getEventHistory();
        $this->assertEquals(new ImmutablePosition(1, 0), $history[0]);
        $this->assertEquals(new ImmutablePosition(1, -1), $history[1]);
        $this->assertEquals(new ImmutablePosition(0, -1), $history[2]);
        $this->assertEquals(new ImmutablePosition(0,0), $history[3]);
    }
}
