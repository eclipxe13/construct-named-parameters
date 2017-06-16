<?php
namespace Tests\ConstructNamedParameters\Samples;

use ConstructNamedParameters\Contracts\CreatableFromArrayInterface;
use ConstructNamedParameters\Traits\StaticCreateTrait;

class FooCreatable extends Foo implements CreatableFromArrayInterface
{
    use StaticCreateTrait;
}
