<?php

use PHPUnit\Framework\TestCase;
use LangtonsAnt\Contracts\PositionInterface;
use LangtonsAnt\ValueObjects\Position;
use LangtonsAnt\ValueObjects\TurnDegree;

final class TurnDegreeValueObjectTest extends TestCase
{
    /**
     * @expectedException \LangtonsAnt\Exceptions\InvalidTurnDegreeException
     */
    public function test_throw_exception_only_turnable_degrees_allowed()
    {
        new TurnDegree(88);
    }

    public function test_same_as()
    {
        $degree = new TurnDegree(90);
        $degree2 = new TurnDegree(270);
        $degree3 = new TurnDegree(0);
        $this->assertTrue($degree->sameAs(new TurnDegree(-270)));
        $this->assertTrue($degree->sameAs(new TurnDegree(90)));
        $this->assertTrue($degree2->sameAs(new TurnDegree(-90)));
        $this->assertTrue($degree3->sameAs(new TurnDegree(360)));
    }

    public function test_min()
    {
        $degree = new TurnDegree(180);
        $this->assertEquals(new TurnDegree(0), $degree->min(new TurnDegree(180)));
        $this->assertEquals(new TurnDegree(90), $degree->min(new TurnDegree(90)));
        $this->assertEquals(new TurnDegree(270), $degree->min(new TurnDegree(270)));
    }

    public function test_plus()
    {
        $degree = new TurnDegree(180);
        $this->assertEquals(new TurnDegree(0), $degree->add(new TurnDegree(180)));
        $this->assertEquals(new TurnDegree(270), $degree->add(new TurnDegree(90)));
        $this->assertEquals(new TurnDegree(90), $degree->add(new TurnDegree(270)));
    }
}
