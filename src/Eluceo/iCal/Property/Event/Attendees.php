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

use Eluceo\iCal\Property;

class Attendees extends Property
{
    /** @var Property[] */
    protected $attendees = [];

    const PROPERTY_NAME = 'ATTENDEES';

    public function __construct()
    {
        // Overwrites constructor functionality of Property
    }

    /**
     * @param       $value
     * @param array $params
     *
     * @return $this
     */
    public function add($value, $params = [])
    {
        $this->attendees[] = new Property('ATTENDEE', $value, $params);

        return $this;
    }

    /**
     * @param Property[] $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->attendees = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toLines()
    {
        $lines = [];
        foreach ($this->attendees as $attendee) {
            $lines[] = $attendee->toLine();
        }

        return $lines;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return self::PROPERTY_NAME;
    }
}
