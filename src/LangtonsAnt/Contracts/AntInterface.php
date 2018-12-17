<?php

namespace LangtonsAnt\Contracts;

interface AntInterface
{
    public function forwardLeft() : void;
    public function forwardRight() : void;
    public function getCurrentPosition() : PositionInterface;
    public function getEventHistory() : iterable;
}
