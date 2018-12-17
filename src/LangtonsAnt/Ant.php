<?php

namespace LangtonsAnt;
use LangtonsAnt\Contracts\AntInterface;
use LangtonsAnt\Contracts\PositionInterface;
use LangtonsAnt\Exceptions\InvalidDegreesException;

class Ant implements AntInterface
{
    private $position;
    private $degrees;
    private $eventHistory = [];
    private $degreeMapping = [
        0=>'up',
        90=>'right',
        180=>'down',
        270=>'left',
        360=>'up'
    ];

    public function __construct(PositionInterface $position, int $degrees)
    {
        $this->position = $position;
        $this->degrees = $degrees;

        $allowedDegrees = array_keys($this->degreeMapping);
        if(!in_array($degrees, $allowedDegrees)) {
            throw InvalidDegreesException::forDegrees($degrees, $allowedDegrees);
        }
    }

    public function moveLeft() : void
    {
        $this->degrees -= 90;
        $this->correctDegrees();
        $this->updatePosition();
    }

    public function moveRight() : void
    {
        $this->degrees += 90;
        $this->correctDegrees();
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
        $direction = $map[$this->degrees];
        $this->position = $this->position->{$direction}(1);
        $this->eventHistory[] = $this->position;
    }

    private function correctDegrees() : void
    {
        if($this->degrees < 0) {
            $this->degrees = $this->degrees + 360;
        } elseif($this->degrees > 360) {
            $this->degrees = $this->degrees - 360;
        }
    }
}
