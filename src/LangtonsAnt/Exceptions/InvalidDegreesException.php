<?php

namespace LangtonsAnt\Exceptions;

class InvalidDegreesException extends \LogicException
{
    public static function forDegrees(int $degrees, array $allowed) : self
    {
        return new self("Invalid degrees given: " . $degrees .
            ". Please chose from " .implode(",", $allowed));
    }
}
