<?php

namespace LangtonsAnt\Contracts;
use LangtonsAnt\ValueObjects\TurnDegree;

interface AntInterface
{
    public function forwardLeft() : void;
    public function forwardRight() : void;
    public function getCurrentPosition() : PositionInterface;
    public function getEventHistory() : iterable;
    public function getCurrentDegree() : TurnDegree;
}
