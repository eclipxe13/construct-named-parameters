<?php
namespace Tests\ConstructNamedParameters\Traits;

use PHPUnit\Framework\TestCase;
use Tests\ConstructNamedParameters\Samples\Foo;
use Tests\ConstructNamedParameters\Samples\FooCreatable;

class StaticCreateTraitTest extends TestCase
{
    public function testCreateMethod()
    {
        $values = [
            'second' => 222,
            'first' => 'first',
        ];
        $third = Foo::class;

        $foo = FooCreatable::create($values);
        $this->assertSame($values['first'], $foo->getFirst());
        $this->assertSame($values['second'], $foo->getSecond());
        $this->assertSame($third, $foo->getThird());
    }
}
