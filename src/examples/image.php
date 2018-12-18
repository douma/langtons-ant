<?php

use LangtonsAnt\{Ant, Position, Board};
use LangtonsAnt\Contracts\BoardInterface;

header('Content-type: image/png');
require __DIR__ . "/../../vendor/autoload.php";

$ant = new Ant(new Position(250,250), new \LangtonsAnt\ValueObjects\TurnDegree(0));
$board = new Board($ant);

$count = 0;
while($count < 15000)
{
    $board->moveAnt();
    $count++;
}

parseImage($board);

function parseImage(BoardInterface $board) : void
{
    $width = 500;
    $height = 500;

    $img = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($img, 255, 255, 255);

    /**
     * @var $position \LangtonsAnt\Contracts\PositionInterface
     */
    foreach($board->getMarkedPositions() as $position)
    {
        imagesetpixel(
            $img,
            $position->getX(),
            $position->getY(),
            $white
        );
    }

    imagepng($img);
}
