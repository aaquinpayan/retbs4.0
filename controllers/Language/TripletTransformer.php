<?php

namespace app\controllers\Language;

interface TripletTransformer
{
    /**
     * @param int $number
     *
     * @return string
     */
    public function transformToWords($number);
}
