<?php

namespace LangtonsAnt\Contracts;

interface BoardInterface
{
    public function moveAnt() : void;
    public function getMarkedPositions() : iterable;
}
