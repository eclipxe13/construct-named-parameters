<?php
namespace Tests\ConstructNamedParameters\Samples;

class SameNameDifferentCase
{
    public $y;

    public function __construct($x, $X)
    {
        $this->y = pow($x, $X);
    }
}
