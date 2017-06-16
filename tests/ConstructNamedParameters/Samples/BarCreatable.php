<?php
namespace Tests\ConstructNamedParameters\Samples;

use ConstructNamedParameters\Contracts\CreatableFromArrayInterface;
use ConstructNamedParameters\Traits\StaticCreateIgnoreCaseTrait;

class BarCreatable extends BarWithCaseArguments implements CreatableFromArrayInterface
{
    use StaticCreateIgnoreCaseTrait;
}
