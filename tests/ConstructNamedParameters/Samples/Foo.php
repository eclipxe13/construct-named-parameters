<?php
namespace Tests\ConstructNamedParameters\Samples;

/**
 * Class Foo Immutable object
 */
class Foo
{
    private $first;
    private $second;
    private $third;

    public function __construct($first, $second = true, $third = self::class)
    {
        $this->first = $first;
        $this->second = $second;
        $this->third = $third;
    }

    public function getFirst()
    {
        return $this->first;
    }

    public function getSecond()
    {
        return $this->second;
    }

    public function getThird()
    {
        return $this->third;
    }
}
