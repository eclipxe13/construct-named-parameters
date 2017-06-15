<?php
namespace ConstructNamedParameters\Traits;

trait ToArrayTrait
{
    /**
     * Export all the object properties recursivelly
     * For each property, if the value of the property is:
     * - object and has a method toArray returns the method
     * - object or array return an array with all properties expoerted with this same routine
     * - else return the property value
     *
     * @return array
     */
    public function toArray()
    {
        $values = [];
        foreach ($this as $property => $value) {
            $values[$property] = $this->toArrayValueInsideToArrayTrait($value);
        }
        return $values;
    }

    private function toArrayValueInsideToArrayTrait($value)
    {
        $isObject = is_object($value);
        if ($isObject) {
            $methodToArray = [$value, 'toArray'];
            if (is_callable($methodToArray)) {
                return call_user_func($methodToArray);
            }
        }
        if ($isObject || is_array($value)) {
            $children = [];
            foreach ($value as $key => $child) {
                $children[$key] = $this->toArrayValueInsideToArrayTrait($child);
            }
            return $children;
        }
        return $value;
    }
}
