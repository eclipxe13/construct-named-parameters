<?php
namespace ConstructNamedParameters\Traits;

trait StaticCreateIgnoreCaseTrait
{
    /**
     * Create an instance of the current object based on named parameters
     *
     * @param array $values
     *
     * @return $this
     */
    public static function create(array $values)
    {
        return construct_named_parameters_uncase(static::class, $values);
    }
}
