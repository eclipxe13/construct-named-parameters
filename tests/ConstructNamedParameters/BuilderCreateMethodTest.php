<?php
namespace Tests\ConstructNamedParameters;

use ConstructNamedParameters\Builder;
use PHPUnit\Framework\TestCase;
use Tests\ConstructNamedParameters\Samples\Foo;
use Tests\ConstructNamedParameters\Samples\SameNameDifferentCase;

class BuilderCreateMethodTest extends TestCase
{
    public function testCreateUsingFooWithExactArguments()
    {
        $values = [
            'first' => 111,
            'second' => new \DateTime(),
            'third' => 333,
        ];

        /** @var Foo $foo */
        $foo = Builder::create(Foo::class, $values);

        $this->assertInstanceOf(Foo::class, $foo);
        $this->assertSame($values['first'], $foo->getFirst());
        $this->assertSame($values['second'], $foo->getSecond());
        $this->assertSame($values['third'], $foo->getThird());
    }

    public function testCreateUsingFooWithNoArguments()
    {
        $values = [
            'first' => null,
            'second' => true,
            'third' => Foo::class,
        ];
        /** @var Foo $foo */
        $foo = Builder::create(Foo::class, []);
        $this->assertInstanceOf(Foo::class, $foo);
        $this->assertSame($values['first'], $foo->getFirst());
        $this->assertSame($values['second'], $foo->getSecond());
        $this->assertSame($values['third'], $foo->getThird());
    }

    public function testCreateUsingFooWithDifferentOrderParameters()
    {
        $values = [
            'third' => 333,
            'second' => new \DateTime(),
            'first' => 111,
        ];

        /** @var Foo $foo */
        $foo = Builder::create(Foo::class, $values);

        $this->assertInstanceOf(Foo::class, $foo);
        $this->assertSame($values['first'], $foo->getFirst());
        $this->assertSame($values['second'], $foo->getSecond());
        $this->assertSame($values['third'], $foo->getThird());
    }

    public function testCreateUsingFooWithExtraParameters()
    {
        $values = [
            'foo' => 'foo',
            'extra' => 'extra',
            'first' => 111,
            'second' => new \DateTime(),
            'third' => 333,
            'other' => null,
        ];

        /** @var Foo $foo */
        $foo = Builder::create(Foo::class, $values);

        $this->assertInstanceOf(Foo::class, $foo);
        $this->assertSame($values['first'], $foo->getFirst());
        $this->assertSame($values['second'], $foo->getSecond());
        $this->assertSame($values['third'], $foo->getThird());
    }

    public function testCreateUsingFooWithMissingParameters()
    {
        $values = [
            'first' => 111,
            'second' => new \DateTime(),
        ];
        $thirdDefault = Foo::class;

        /** @var Foo $foo */
        $foo = Builder::create(Foo::class, $values);

        $this->assertInstanceOf(Foo::class, $foo);
        $this->assertSame($values['first'], $foo->getFirst());
        $this->assertSame($values['second'], $foo->getSecond());
        $this->assertSame($thirdDefault, $foo->getThird());
    }

    public function testCreateSameNameDifferentCase()
    {
        $values = [
            'x' => 2,
            'X' => 3,
        ];
        /** @var SameNameDifferentCase $object */
        $object = Builder::create(SameNameDifferentCase::class, $values);
        $this->assertEquals(8, $object->y);
    }

    public function testUsingGlobalFunctionConstructNamedParameters()
    {
        $values = [
            'first' => 111,
            'second' => new \DateTime(),
            'third' => 333,
        ];

        /** @var Foo $foo */
        $foo = construct_named_parameters(Foo::class, $values);

        $this->assertInstanceOf(Foo::class, $foo);
        $this->assertSame($values['first'], $foo->getFirst());
        $this->assertSame($values['second'], $foo->getSecond());
        $this->assertSame($values['third'], $foo->getThird());
    }
}
