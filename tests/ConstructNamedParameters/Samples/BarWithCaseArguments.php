<?php
namespace Tests\ConstructNamedParameters\Samples;

class BarWithCaseArguments
{
    private $first;
    private $second;
    private $third;

    public function __construct($firstArgument, $secondArgument = true, $thirdArgument = 'BAZ')
    {
        $this->first = $firstArgument;
        $this->second = $secondArgument;
        $this->third = $thirdArgument;
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
