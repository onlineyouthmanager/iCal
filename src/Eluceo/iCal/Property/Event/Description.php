<?php

/*
 * This file is part of the eluceo/iCal package.
 *
 * (c) Markus Poerschke <markus@eluceo.de>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Eluceo\iCal\Property\Event;

use Eluceo\iCal\Property\ValueInterface;
use Eluceo\iCal\Util\PropertyValueUtil;

/**
 * Allows new line charectars to be in the description.
 */
class Description implements ValueInterface
{
    /**
     * The value.
     *
     * @var string
     */
    private $escapedValue;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->escapedValue = PropertyValueUtil::escapeValue((string) $value);
    }

    /**
     * @inheritdoc
     */
    public function getEscapedValue()
    {
        return $this->escapedValue;
    }
}
