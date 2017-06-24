<?php

namespace app\controllers\Language\English;

use app\controllers\Language\ExponentGetter;

class EnglishExponentGetter implements ExponentGetter
{
    private static $exponent = [
        '',
        'Thousand',
        'Million',
        'Billion',
        'Trillion',
        'Quadrillion',
        'Quintillion',
        'Sextillion',
        'Septillion',
        'Octillion',
        'Nonillion',
        'Decillion',
        'Undecillion',
        'Duodecillion',
        'Tredecillion',
        'Quattuordecillion',
        'Quindecillion',
        'Sexdecillion',
        'Septendecillion',
        'Octodecillion',
        'Novemdecillion',
        'Vigintillion',
    ];

    /**
     * @param int $power
     *
     * @return string
     */
    public function getExponent($power)
    {
        return self::$exponent[$power];
    }
}
