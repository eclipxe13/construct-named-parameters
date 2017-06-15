<?php
namespace Tests\ConstructNamedParameters\Samples;

class FooWithCaseArguments extends Foo
{
    public function __construct($firstArgument, $secondArgument = true, $thirdArgument = self::class)
    {
        parent::__construct($firstArgument, $secondArgument, $thirdArgument);
    }
}
