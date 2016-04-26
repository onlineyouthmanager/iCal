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

use Eluceo\iCal\Util\PropertyParameterValueUtil;

class ParameterBag
{
    /**
     * @var array
     */
    protected $params;

    public function __construct(array $params = [])
    {
        $this->params = $params;
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function setParam($name, $value)
    {
        assert(is_string($name), '$name parameter should be a string');

        $this->params[$name] = $value;
    }

    /**
     * Checks if there are any params.
     *
     * @return bool
     */
    public function hasParams()
    {
        return count($this->params) > 0;
    }

    /**
     * @return string
     */
    public function toString()
    {
        $line = '';

        foreach ($this->params as $param => $paramValues) {
            if (!is_array($paramValues)) {
                $paramValues = [$paramValues];
            }

            foreach ($paramValues as $k => $v) {
                $paramValues[$k] = PropertyParameterValueUtil::escapeParamValue($v);
            }

            if ('' != $line) {
                $line .= ';';
            }

            $line .= $param . '=' . implode(',', $paramValues);
        }

        return $line;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }
}
