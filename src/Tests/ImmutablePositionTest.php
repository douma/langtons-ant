<?php

use PHPUnit\Framework\TestCase;
use LangtonsAnt\Contracts\PositionInterface;
use LangtonsAnt\ValueObjects\Position;

final class ImmutablePositionTest extends TestCase
{
    /**
     * @var $sut Position
     */
    private $sut;

    public function setUp()
    {
        $this->sut = new \LangtonsAnt\ValueObjects\Position(0,0);
    }

    public function test_position_should_return_new_instance_for_move_right()
    {
        $this->assertEquals(new Position(1, 0), $this->sut->right());
        $this->assertEquals(new Position(1, 0), $this->sut->right());
    }

    public function test_position_should_return_new_instance_for_move_left()
    {
        $this->assertEquals(new Position(-1, 0), $this->sut->left());
        $this->assertEquals(new Position(-1, 0), $this->sut->left());
    }

    public function test_position_should_return_new_instance_for_move_up()
    {
        $this->assertEquals(new Position(0, 1), $this->sut->up());
        $this->assertEquals(new Position(0, 1), $this->sut->up());
    }

    public function test_position_should_return_new_instance_for_move_down()
    {
        $this->assertEquals(new Position(0, -1), $this->sut->down());
        $this->assertEquals(new Position(0, -1), $this->sut->down());
    }

    public function test_toString()
    {
        $position = $this->sut->down();
        $this->assertEquals('[0,-1]', $position->__toString());
    }
}
