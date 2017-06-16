<?php
namespace Tests\ConstructNamedParameters\Samples;

use ConstructNamedParameters\Traits\StaticCreateIgnoreCaseTrait;

class BarCreatable extends BarWithCaseArguments
{
    use StaticCreateIgnoreCaseTrait;
}
