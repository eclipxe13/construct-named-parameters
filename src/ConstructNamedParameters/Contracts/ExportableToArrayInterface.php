<?php
namespace ConstructNamedParameters\Contracts;

interface ExportableToArrayInterface
{
    /**
     * Return an array with properties as key values
     *
     * @return array
     */
    public function toArray();
}
