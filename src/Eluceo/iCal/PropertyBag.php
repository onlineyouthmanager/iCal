<?php

/*
 * This file is part of the eluceo/iCal package.
 *
 * (c) Markus Poerschke <markus@eluceo.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eluceo\iCal;

class PropertyBag implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $elements = [];

    /**
     * Creates a new Property with $name, $value and $params.
     *
     * @deprecated The property bag should not be used as a property factory. Use `$this->add` instead.
     *
     * @param       $name
     * @param       $value
     * @param array $params
     *
     * @return $this
     */
    public function set($name, $value, $params = [])
    {
        $this->add(new Property($name, $value, $params));
    }

    /**
     * Adds a Property. If Property already exists an Exception will be thrown.
     *
     * @param Property $property
     *
     * @return $this
     *
     * @throws \Exception
     */
    public function add(Property $property)
    {
        $name = $property->getName();

        if (isset($this->elements[$name])) {
            throw new \Exception("Property with name '{$name}' already exists");
        }

        $this->elements[$name] = $property;
    }

    /**
     * @return \ArrayObject
     */
    public function getIterator()
    {
        return new \ArrayObject($this->elements);
    }
}
