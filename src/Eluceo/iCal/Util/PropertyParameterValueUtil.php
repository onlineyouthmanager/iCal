<?php

namespace Eluceo\iCal\Util;

abstract class PropertyParameterValueUtil
{
    /**
     * Returns an escaped string for a param value.
     *
     * @param string $value
     *
     * @return string
     */
    public static function escapeParamValue($value)
    {
        $count = 0;
        $value = str_replace('\\', '\\\\', $value);
        $value = str_replace('"', '\"', $value, $count);
        $value = str_replace("\n", '\\n', $value);

        if (false !== strpos($value, ';') || false !== strpos($value, ',') || false !== strpos($value, ':') || $count) {
            $value = '"' . $value . '"';
        }

        return $value;
    }
}
