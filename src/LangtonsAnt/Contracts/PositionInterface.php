<?php

namespace LangtonsAnt\Contracts;

interface PositionInterface
{
    public function right() : PositionInterface;
    public function left() : PositionInterface;
    public function up() : PositionInterface;
    public function down() : PositionInterface;
    public function getX() : int;
    public function getY() : int;
    public function __toString() : string;
}
