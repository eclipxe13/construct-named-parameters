<?php
namespace Tests\ConstructNamedParameters;

use ConstructNamedParameters\Builder;
use PHPUnit\Framework\TestCase;
use Tests\ConstructNamedParameters\Samples\Foo;

class BuilderRetrieveArgumentsMethodTest extends TestCase
{
    public function testGetFooArguments()
    {
        $expected = [
            'first' => null,
            'second' => true,
            'third' => Foo::class,
        ];

        $arguments = Builder::retrieveArguments(Foo::class);

        $this->assertEquals($expected, $arguments);
    }

    public function testRetrieveArgumentsWithNoExistentClass()
    {
        $className = '\ConstructNamedParameters\NonExistentClass';

        $this->expectExceptionMessage($className);

        Builder::retrieveArguments($className);
    }

    public function testUsingGlobalFunctionConstructNamedParametersUncase()
    {
        $expected = [
            'first' => null,
            'second' => true,
            'third' => Foo::class,
        ];

        $arguments = constructor_arguments(Foo::class);

        $this->assertEquals($expected, $arguments);
    }
}
