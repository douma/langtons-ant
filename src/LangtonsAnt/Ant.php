<?php

namespace LangtonsAnt;
use LangtonsAnt\Contracts\{AntInterface, PositionInterface};
use LangtonsAnt\ValueObjects\TurnDegree;

class Ant implements AntInterface
{
    private $position;
    private $degree;
    private $eventHistory = [];
    private $degreeMapping = [
        0=>'up',
        90=>'right',
        180=>'down',
        270=>'left',
        360=>'up'
    ];

    public function __construct(PositionInterface $position, TurnDegree $degree)
    {
        $this->position = $position;
        $this->degree = $degree;
        $this->eventHistory[] = $position;

        $allowedDegrees = array_keys($this->degreeMapping);
    }

    public function forwardLeft() : void
    {
        $this->degree = new TurnDegree($this->degree->getDegree() - 90);
        $this->updatePosition();
    }

    public function forwardRight() : void
    {
        $this->degree = new TurnDegree($this->degree->getDegree() + 90);
        $this->updatePosition();
    }

    public function getCurrentPosition() : PositionInterface
    {
        return $this->position;
    }

    public function getEventHistory() : iterable
    {
        return $this->eventHistory;
    }

    private function updatePosition() : void
    {
        $map = $this->degreeMapping;
        $direction = $map[$this->degree->getDegree()];
        $this->position = $this->position->{$direction}(1);
        $this->eventHistory[] = $this->position;
    }
}
