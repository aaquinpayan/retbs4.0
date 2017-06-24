<?php

namespace app\controllers\CurrencyTransformer;

interface CurrencyTransformer
{
    /**
     * @param int    $amount
     * @param string $currency
     *
     * @return string
     */
    public function toWords($amount, $currency);
}
