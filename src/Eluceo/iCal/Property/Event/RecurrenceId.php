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

use Eluceo\iCal\ParameterBag;
use Eluceo\iCal\Property;
use Eluceo\iCal\Util\DateUtil;
use Eluceo\iCal\Property\ValueInterface;

/**
 * Implementation of Recurrence Id.
 *
 * @see http://www.ietf.org/rfc/rfc2445.txt 4.8.4.4 Recurrence ID
 */
class RecurrenceId extends Property
{
    /**
     * The effective range of recurrence instances from the instance
     * specified by the recurrence identifier specified by the property.
     */
    const RANGE_THISANDPRIOR  = 'THISANDPRIOR';
    const RANGE_THISANDFUTURE = 'THISANDFUTURE';

    /**
     * The dateTime to identify a particular instance of a recurring event which is getting modified.
     *
     * @var \DateTime
     */
    protected $dateTime;

    /**
     * Specify the effective range of recurrence instances from the instance.
     *
     * @var string
     */
    protected $range;

    public function __construct(\DateTime $dateTime = null)
    {
        $this->dateTime = $dateTime;
        parent::__construct('RECURRENCE-ID', null);
    }

    public function applyTimeSettings($noTime = false, $useTimezone = false, $useUtc = false)
    {
        $params = DateUtil::getDefaultParams($this->dateTime, $noTime, $useTimezone);

        foreach ($params as $name => $value) {
            $this->parameterBag->setParam($name, $value);
        }

        if ($this->range) {
            $this->parameterBag->setParam('RANGE', $this->range);
        }

        $this->setValue(DateUtil::getDateString($this->dateTime, $noTime, $useTimezone, $useUtc));
    }

    /**
     * @param string $range
     *
     * @return \Eluceo\iCal\Property\Event\RecurrenceId
     */
    public function setRange($range)
    {
        $this->range = $range;
    }

    /**
     * @param \DateTime $dateTime
     */
    public function setDateTime(\DateTime $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function toLines()
    {
        if (!$this->value instanceof ValueInterface) {
            throw new \Exception('The value must implement the ValueInterface. Call RecurrenceId::applyTimeSettings() before adding RecurrenceId.');
        } else {
            return parent::toLines();
        }
    }
}
