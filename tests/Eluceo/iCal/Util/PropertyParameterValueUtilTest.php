<?php

namespace Eluceo\iCal\Util;

class PropertyParameterValueUtilTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideTestStrings
     */
    public function testEscapeParamValue($testString, $expected)
    {
        $this->assertEquals(
            $expected,
            PropertyParameterValueUtil::escapeParamValue($testString)
        );
    }

    public function provideTestStrings()
    {
        return [
            'No escaping necessary' => [ 'test string', 'test string' ],
            'Text contains double quotes' => [ 'Containing "double-quotes"', '"Containing \\"double-quotes\\""' ],
            'Text with semicolon' => [ 'Containing forbidden chars like a ;', '"Containing forbidden chars like a ;"' ],
            'Text with colon' => [ 'Containing forbidden chars like a :', '"Containing forbidden chars like a :"' ],
        ];
    }
}
