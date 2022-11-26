<?php

namespace Sheypoor\PhpTesting;

use InvalidArgumentException;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

final class SheyponacciTest extends TestCase
{

    /**
     * @dataProvider provider
     */
    public function testReturnValue($expectedResult, $input)
    {
        $this->assertEquals(Sheyponacci::calculate($expectedResult), $input);
    }

    public function testOutOfRangeException()
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage("Input must be a between 0 and ".Sheyponacci::MAX);
        Sheyponacci::calculate(Sheyponacci::MAX+1);
    }

    public function testInvalidArgumentNotInteger()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Application only accepts integers. Input was: string");
        Sheyponacci::calculate("string");
    }

    /**
     * @return array
     */
    public function provider()
    {
        return [
            array(0, 0),
            array(1, 1),
            array(2, 1),
            array(6, 8),
            array(10, 10),
        ];
    }
}