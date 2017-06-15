<?php
namespace ConstructNamedParameters;

abstract class Builder
{
    /**
     * Retrive by reflection the constructor arguments from a class.
     * The information is statically stored in the function so call two times
     * the same class will only run one Reflection
     *
     * The array is a map of keys as the name of the parameter and value as the
     * default value (if any) of the parameter.
     *
     * The constructor (int $value, array $data = [], $type = 5) returns:
     * [
     *     'value' => null,
     *     'data' => [],
     *     'type' => 5
     * ]
     *
     * @param string $className
     *
     * @return array
     */
    public static function retrieveArguments($className)
    {
        static $cache = [];

        if (! array_key_exists($className, $cache)) {
            $reflection = new \ReflectionClass($className);
            $constructor = $reflection->getConstructor();
            $parameters = $constructor->getParameters();
            $constructorParameters = [];
            foreach ($parameters as $parameter) {
                $constructorParameters[$parameter->getName()] = ($parameter->isOptional()) ? $parameter->getDefaultValue() : null;
            }
            $cache[$className] = $constructorParameters;
        }

        return $cache[$className];
    }

    /**
     * Create an instance of a class using the given named parameters
     *
     * @param string $classname
     * @param array $values
     * @param array $parameters
     *
     * @return object
     */
    public static function create($classname, array $values = [], array $parameters = null)
    {
        // get parameters if they were not set
        if (null === $parameters) {
            $parameters = static::retrieveArguments($classname);
        }
        // build the arguments based on the parameters list and the values
        $mixed = [];
        foreach ($parameters as $parameter => $defaultValue) {
            $mixed[] = array_key_exists($parameter, $values) ? $values[$parameter] : $defaultValue;
        }

        return new $classname(...$mixed);
    }

    /**
     * This function is the same as construct_named_parameters but it convert the case of values and parameters
     * Be aware that a constructor can have two parameters with the same name and different case.
     * In this situation this function will thow an \InvalidArgumentException
     *
     * @see create()
     *
     * @param string $classname
     * @param array $values
     * @param array|null $parameters
     *
     * @return object
     *
     * @throws \InvalidArgumentException if the class has two parameters with the same name but different case
     */
    public static function createIgnoreCase($classname, array $values = [], array $parameters = null)
    {
        // get parameters if they were not set
        if (null === $parameters) {
            $parameters = static::retrieveArguments($classname);
        }
        $originalCount = count($parameters);
        $parameters = array_change_key_case($parameters, CASE_LOWER);
        if (count($parameters) !== $originalCount) {
            throw new \InvalidArgumentException(
                "The class $classname has parameters with the same name but different case"
            );
        }
        $values = array_change_key_case($values, CASE_LOWER);

        return static::create($classname, $values, $parameters);
    }
}
