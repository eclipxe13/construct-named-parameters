<?php
namespace Tests\ConstructNamedParameters\Samples;

use ConstructNamedParameters\Contracts\ExportableToArrayInterface;
use ConstructNamedParameters\Traits\ToArrayTrait;

class ArrayableInvoice implements ExportableToArrayInterface
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
