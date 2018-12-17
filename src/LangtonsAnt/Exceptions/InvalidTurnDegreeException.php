<?php

namespace LangtonsAnt\Exceptions;

class InvalidTurnDegreeException extends \LogicException
{
    public static function forDegrees(int $degree) : self
    {
        return new self("Invalid degrees given: " . $degree . '. Should be dividable by 90');
    }
}
