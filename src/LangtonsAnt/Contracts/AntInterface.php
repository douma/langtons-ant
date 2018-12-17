<?php

namespace LangtonsAnt\Contracts;

interface AntInterface
{
    public function moveLeft() : void;
    public function moveRight() : void;
    public function getCurrentPosition() : PositionInterface;
    public function getEventHistory() : iterable;
}
