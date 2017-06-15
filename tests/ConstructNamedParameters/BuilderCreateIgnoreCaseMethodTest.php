<?php
namespace Tests\ConstructNamedParameters;

use ConstructNamedParameters\Builder;
use PHPUnit\Framework\TestCase;
use Tests\ConstructNamedParameters\Samples\FooWithCaseArguments as Foo;
use Tests\ConstructNamedParameters\Samples\SameNameDifferentCase;

class BuilderCreateIgnoreCaseMethodTest extends TestCase
{
    public function testConstructWithSameCase()
    {
        $values = [
            'firstArgument' => 111,
            'secondArgument' => new \DateTime(),
            'thirdArgument' => 333,
        ];

        /** @var Foo $foo */
        $foo = Builder::createIgnoreCase(Foo::class, $values);

        $this->assertInstanceOf(Foo::class, $foo);
        $this->assertSame($values['firstArgument'], $foo->getFirst());
        $this->assertSame($values['secondArgument'], $foo->getSecond());
        $this->assertSame($values['thirdArgument'], $foo->getThird());
    }

    public function testConstructWithDifferentCase()
    {
        $values = [
            'FiRsTaRgUmEnT' => 111,
            'SECONDargument' => new \DateTime(),
            'thirdARGUMENT' => 333,
        ];

        /** @var Foo $foo */
        $foo = Builder::createIgnoreCase(Foo::class, $values);

        $this->assertInstanceOf(Foo::class, $foo);
        $this->assertSame($values['FiRsTaRgUmEnT'], $foo->getFirst());
        $this->assertSame($values['SECONDargument'], $foo->getSecond());
        $this->assertSame($values['thirdARGUMENT'], $foo->getThird());
    }

    public function testCreateSameNameDifferentCaseCreateException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('has parameters with the same name but different case');
        Builder::createIgnoreCase(SameNameDifferentCase::class, []);
    }

    public function testUsingGlobalFunctionConstructNamedParametersUncase()
    {
        $values = [
            'FiRsTaRgUmEnT' => 111,
            'SECONDargument' => new \DateTime(),
            'thirdARGUMENT' => 333,
        ];

        /** @var Foo $foo */
        $foo = construct_named_parameters_uncase(Foo::class, $values);

        $this->assertInstanceOf(Foo::class, $foo);
        $this->assertSame($values['FiRsTaRgUmEnT'], $foo->getFirst());
        $this->assertSame($values['SECONDargument'], $foo->getSecond());
        $this->assertSame($values['thirdARGUMENT'], $foo->getThird());
    }
}
