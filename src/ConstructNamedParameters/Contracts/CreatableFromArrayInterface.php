<?php

namespace ConstructNamedParameters\Contracts;

interface CreatableFromArrayInterface
{
    /**
     * Create an instance of the object based on the key and values from the array
     *
     * @param array $values
     *
     * @return $this
     */
    public static function create(array $values);
}
