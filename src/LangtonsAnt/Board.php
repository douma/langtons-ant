<?php

namespace LangtonsAnt;

use LangtonsAnt\Contracts\AntInterface;
use LangtonsAnt\Contracts\BoardInterface;
use LangtonsAnt\Contracts\PositionInterface;

class Board implements BoardInterface
{
    private $ant;
    private $length;
    private $marked = [];

    public function __construct(AntInterface $ant, int $length)
    {
        $this->ant = $ant;
        $this->length = $length;
    }

    public function moveAnt() : void
    {
        for($x = 0;$x<$this->length;$x++) { 
            $antPosition = $this->ant->getCurrentPosition();
            if($this->isMarked($antPosition)) {
                $this->unmarkPosition($antPosition);
                $this->ant->forwardLeft();
            } else {
                $this->markPosition($antPosition);
                $this->ant->forwardRight();
            }
        }
    }

    public function getMarkedPositions() : iterable
    {
        return array_values($this->marked);
    }

    private function isMarked(PositionInterface $position) : bool
    {
        return isset($this->marked[(string) $position]);
    }

    private function markPosition(PositionInterface $position)
    {
        $this->marked[(string) $position] = $position;
    }

    private function unmarkPosition(PositionInterface $position)
    {
        unset($this->marked[(string) $position]);
    }
}
