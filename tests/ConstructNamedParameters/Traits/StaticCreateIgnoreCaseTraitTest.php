<?php

namespace Tests\ConstructNamedParameters\Traits;

use PHPUnit\Framework\TestCase;
use Tests\ConstructNamedParameters\Samples\BarCreatable;

class StaticCreateIgnoreCaseTraitTest extends TestCase
{
    public function testCreateMethod()
    {
        $values = [
            'SecondArgument' => 222,
            'FIRSTargument' => 'first',
        ];
        $third = 'BAZ';

        $foo = BarCreatable::create($values);
        $this->assertSame($values['FIRSTargument'], $foo->getFirst());
        $this->assertSame($values['SecondArgument'], $foo->getSecond());
        $this->assertSame($third, $foo->getThird());
    }
}
