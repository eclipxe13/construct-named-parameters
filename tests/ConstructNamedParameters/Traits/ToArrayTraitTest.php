<?php
namespace Tests\ConstructNamedParameters\Traits;

use PHPUnit\Framework\TestCase;
use Tests\ConstructNamedParameters\Samples\ArrayableInvoice;
use Tests\ConstructNamedParameters\Samples\ArrayableLine;

class ToArrayTraitTest extends TestCase
{
    public function testToArrayOnDefinedStruct()
    {
        $expected = [
            'id' => 111,
            'lines' => [
                [
                    'id' => 'A',
                    'amount' => 123,
                    'foo' => ['a' => 'A', 'b' => 'FOO'],
                ],
                [
                    'id' => 'B',
                    'amount' => 321,
                    'foo' => ['a' => 'B', 'b' => 'FOO'],
                ],
                [
                    'id' => 'C',
                    'amount' => 222,
                    'foo' => ['a' => 'C', 'b' => 'FOO'],
                ],
            ],
        ];

        $source = new ArrayableInvoice(111, [
            new ArrayableLine('A', 123),
            new ArrayableLine('B', 321),
            new ArrayableLine('C', 222),
        ]);

        $this->assertEquals($expected, $source->toArray());
    }
}
