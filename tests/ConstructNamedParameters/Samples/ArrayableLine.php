<?php
namespace Tests\ConstructNamedParameters\Samples;

use ConstructNamedParameters\Traits\ToArrayTrait;

class ArrayableLine
{
    use ToArrayTrait;

    public $id;
    public $amount;
    private $foo;

    public function __construct($id, $amount)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->foo = new \stdClass();
        $this->foo->a = $id;
        $this->foo->b = 'FOO';
    }
}
