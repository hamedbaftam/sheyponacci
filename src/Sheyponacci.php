<?php

namespace Sheypoor\PhpTesting;

use InvalidArgumentException;
use OutOfRangeException;

class Sheyponacci
{

    const MAX = 1000000000;

    public static function calculate($n)
    {
//        validate range and type : based on your
        self::validate($n);

        $f = array();
        $f[0] = 0;
        $f[1] = 1;

        for ($i = 2; $i <= $n; $i++) {
            $f[$i] = array_sum(str_split($f[$i - 1])) + array_sum(str_split($f[$i - 2]));
        }

        return $f[$n];
    }

    /**
     * @param integer $n
     */
    protected static function validate($n)
    {
        if (!is_integer($n)) {
            throw new InvalidArgumentException('Application only accepts integers. Input was: ' . $n);
        }

        if ($n < 0 or $n > Sheyponacci::MAX) {
            throw new OutOfRangeException('Input must be a between 0 and ' . Sheyponacci::MAX);
        }
    }
}