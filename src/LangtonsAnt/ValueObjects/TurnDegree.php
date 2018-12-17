<?php

namespace LangtonsAnt\ValueObjects;

use LangtonsAnt\Exceptions\InvalidTurnDegreeException;

class TurnDegree
{
    private $degree;

    public function __construct(int $degree)
    {
        $this->degree = $degree;
        $this->correctDegree();

        if(!in_array($this->degree, [0,90,180,270,360]))
        {
            throw InvalidTurnDegreeException::forDegrees($degree);
        }
    }

    public function getDegree() : int
    {
        return $this->degree;
    }

    private function correctDegree() : void
    {
        if($this->degree < 0) {
            $this->degree += 360;
        } elseif($this->degree > 360) {
            $this->degree %= 360;
        }
    }
}
