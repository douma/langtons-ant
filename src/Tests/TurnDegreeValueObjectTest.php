<?php

use PHPUnit\Framework\TestCase;
use LangtonsAnt\Contracts\PositionInterface;
use LangtonsAnt\ImmutablePosition;

final class TurnDegreeValueObjectTest extends TestCase
{
    /**
     * @expectedException \LangtonsAnt\Exceptions\InvalidTurnDegreeException
     */
    public function test_throw_exception_only_turnable_degrees_allowed()
    {
        new \LangtonsAnt\ValueObjects\TurnDegree(88);
    }

    public function test_throw_no_exception()
    {
        $this->assertEquals(0, (new \LangtonsAnt\ValueObjects\TurnDegree(0))->getDegree());
        $this->assertEquals(90, (new \LangtonsAnt\ValueObjects\TurnDegree(90))->getDegree());
        $this->assertEquals(180, (new \LangtonsAnt\ValueObjects\TurnDegree(180))->getDegree());
        $this->assertEquals(270, (new \LangtonsAnt\ValueObjects\TurnDegree(270))->getDegree());
        $this->assertEquals(360, (new \LangtonsAnt\ValueObjects\TurnDegree(360))->getDegree());
        $this->assertEquals(270, (new \LangtonsAnt\ValueObjects\TurnDegree(-90))->getDegree());
        $this->assertEquals(180, (new \LangtonsAnt\ValueObjects\TurnDegree(-180))->getDegree());
        $this->assertEquals(0, (new \LangtonsAnt\ValueObjects\TurnDegree(3600))->getDegree());
        $this->assertEquals(90, (new \LangtonsAnt\ValueObjects\TurnDegree(3600 + 90))->getDegree());
    }

    public function test_same_as()
    {
        $degree = new \LangtonsAnt\ValueObjects\TurnDegree(90);
        $this->assertFalse($degree->sameAs(new \LangtonsAnt\ValueObjects\TurnDegree(180)));
        $this->assertFalse($degree->sameAs(new \LangtonsAnt\ValueObjects\TurnDegree(360 + 90)));
        $this->assertFalse($degree->sameAs(new \LangtonsAnt\ValueObjects\TurnDegree(90)));
    }
}
