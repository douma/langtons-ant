<?php

namespace LangtonsAnt\ValueObjects;

use LangtonsAnt\Contracts\PositionInterface;

class Position implements PositionInterface
{
    private $x, $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function right() : PositionInterface
    {
        $new = $this->new();
        $new->x += 1;
        return $new;
    }

    public function left() : PositionInterface
    {
        $new = $this->new();
        $new->x -= 1;
        return $new;
    }

    public function down() : PositionInterface
    {
        $new = $this->new();
        $new->y -= 1;
        return $new;
    }

    public function up() : PositionInterface
    {
        $new = $this->new();
        $new->y += 1;
        return $new;
    }

    public function getX() : int
    {
        return $this->x;
    }

    public function getY() : int
    {
        return $this->y;
    }

    public function __toString() : string
    {
        return '[' . $this->x . ',' . $this->y.']';
    }

    private function new() : self
    {
        return clone $this;
    }
}
