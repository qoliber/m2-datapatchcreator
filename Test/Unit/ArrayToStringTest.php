<?php
/**
 * Copyright © Qoliber. All rights reserved.
 *
 * @category    Qoliber
 * @package     Qoliber_DataPatchCreator
 * @author      Jakub Winkler <jwinkler@qoliber.com
 * @author      Sebastian Strojwas <sstrojwas@qoliber.com>
 * @author      Wojciech M. Wnuk <wwnuk@qoliber.com>
 */

namespace Qoliber\DataPatchCreator\Test\Unit;

use PHPUnit\Framework\TestCase;
use Qoliber\DataPatchCreator\Converters\ObjectToString;

class ArrayToStringTest extends TestCase
{

    /** @var ObjectToString */
    protected $objectToStringConverter;

    /**  */
    protected function setUp(): void
    {
        $this->objectToStringConverter = new ObjectToString();
    }

    /**
     *
     */
    public function testArrayNotationToString()
    {
        $array = ['10', '20', '30', '40'];
        $complexArray = [
            'test' => [
                'some-value' => false,
                'another-value' => null,
            ]
        ];

        $updatedArrayNotation = <<<EOL
[
    0 => '10',
    1 => '20',
    2 => '30',
    3 => '40',
]
EOL;

        $expectedComplexArray = <<<EOL
[
    'test' => [
        'some-value' => false,
        'another-value' => NULL,
    ],
]
EOL;

        $this->assertSame($updatedArrayNotation, $this->objectToStringConverter->convertDataArrayToString($array));
        $this->assertSame($updatedArrayNotation, $this->objectToStringConverter->convertDataArrayToString($array));
        $this->assertSame(
            $expectedComplexArray,
            $this->objectToStringConverter->convertDataArrayToString($complexArray)
        );
    }
}
