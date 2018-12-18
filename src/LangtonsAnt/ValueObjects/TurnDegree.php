<?php

namespace LangtonsAnt\ValueObjects;

use LangtonsAnt\Exceptions\InvalidTurnDegreeException;

class TurnDegree
{
    private $degree;

    public function __construct(int $degree)
    {
        $this->degree = $degree;

        if(!in_array(abs($this->degree), [0,90,180,270,360]))
        {
            throw InvalidTurnDegreeException::forDegrees($degree);
        }
    }

    public function sameAs(TurnDegree $degree) : bool
    {
        $normalizeFrom = ($degree->degree + 360) % 360;
        $normalizeTo = ($this->degree + 360) % 360;
        return $normalizeFrom == $normalizeTo;
    }

    public function add(TurnDegree $degree) : TurnDegree
    {
        $new = $this->degree + $degree->degree;
        $normalize = ($new + 360) % 360;
        return new TurnDegree(abs($normalize));
    }

    public function min(TurnDegree $degree) : TurnDegree
    {
        $new = $this->degree - $degree->degree;
        $normalize = ($new + 360) % 360;
        return new TurnDegree($normalize);
    }

    public function __toString() : string
    {
        return (string) $this->degree;
    }
}
