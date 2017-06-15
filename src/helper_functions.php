<?php

/**
 * This objects create alias functions for \ConstructNamedParameters\Builder functions
 */

/**
 * @see \ConstructNamedParameters\Builder::retrieveArguments()
 *
 * @param string $className
 *
 * @return array
 */
function constructor_arguments($className)
{
    return \ConstructNamedParameters\Builder::retrieveArguments($className);
}

/**
 * @see \ConstructNamedParameters\Builder::create()
 *
 * @param string $classname
 * @param array $values
 * @param array $parameters
 *
 * @return object
 */
function construct_named_parameters($classname, array $values = [], array $parameters = null)
{
    return \ConstructNamedParameters\Builder::create($classname, $values, $parameters);
}

/**
 * @see \ConstructNamedParameters\Builder::createIgnoreCase()
 *
 * @param string $classname
 * @param array $values
 * @param array|null $parameters
 *
 * @return object
 *
 * @throws \InvalidArgumentException if the class has two parameters with the same name but different case
 */
function construct_named_parameters_uncase($classname, array $values = [], array $parameters = null)
{
    return \ConstructNamedParameters\Builder::createIgnoreCase($classname, $values, $parameters);
}
