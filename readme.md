# Langton's ant

> Langton's ant is a two-dimensional universal Turing machine with a very simple set of rules but complex emergent behavior

> *Source: https://en.wikipedia.org/wiki/Langton%27s_ant*

![](https://images.weserv.nl?url=i.imgur.com/DZIYWEE.png&w=350)

## Explanation

The behavior of `LangtonsAnt\Board` explains the business rules as
described by Wikipedia: 

1. At a white square, turn 90° right, flip the color of the square, move forward one unit
2. At a black square, turn 90° left, flip the color of the square, move forward one unit

```php
public function moveAnt() : void
{
    $antPosition = $this->ant->getCurrentPosition();
    if($this->isMarked($antPosition)) {
        $this->unmarkPosition($antPosition);
        $this->ant->forwardLeft();
    } else {
        $this->markPosition($antPosition);
        $this->ant->forwardRight();
    }
}
```

## Example output

To see the output of the Langton's ant, start the following PHP server:

`php -S localhost:1234 src/examples/image.php`

## Run docker

`docker build -t langton .`
`docker run -d -p 8080:8080 langton`

Visit `localhost:8080`