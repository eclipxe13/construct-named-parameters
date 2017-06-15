<?php
namespace Tests\ConstructNamedParameters\Samples;

use ConstructNamedParameters\Traits\ToArrayTrait;

class ArrayableInvoice
{
    use ToArrayTrait;

    public $id;

    public $lines;

    public function __construct($id, array $lines)
    {
        $this->id = $id;
        $this->lines = $lines;
    }
}
