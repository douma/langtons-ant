<?php

use LangtonsAnt\{Ant, Board};
use LangtonsAnt\ValueObjects\Position;
use LangtonsAnt\Contracts\BoardInterface;

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-type: image/png');
require __DIR__ . "/../../vendor/autoload.php";

$ant = new Ant(new Position(250,250), new \LangtonsAnt\ValueObjects\TurnDegree(0));
$board = new Board($ant,21000);
$board->moveAnt();

parseImage($board);
function parseImage(BoardInterface $board) : void
{
    $width = 500;
    $height = 500;

    $img = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($img, 255, 255, 255);

    imagestring($img, 5, 0, 0, gethostname(), $white);

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
