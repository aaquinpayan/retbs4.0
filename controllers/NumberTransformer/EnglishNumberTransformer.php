<?php

namespace app\controllers\NumberTransformer;

use app\controllers\Language\English\EnglishDictionary;
use app\controllers\Language\English\EnglishExponentGetter;
use app\controllers\Language\English\EnglishTripletTransformer;
use app\controllers\Service\NumberToTripletsConverter;

class EnglishNumberTransformer implements NumberTransformer
{
    /**
     * @inheritdoc
     */
    public function toWords($number)
    {
        $dictionary = new EnglishDictionary();
        $numberToTripletsConverter = new NumberToTripletsConverter();
        $tripletTransformer = new EnglishTripletTransformer($dictionary);
        $exponentInflector = new EnglishExponentGetter();

        $numberTransformer = (new NumberTransformerBuilder())
            ->withDictionary($dictionary)
            ->withWordsSeparatedBy(' ')
            ->transformNumbersBySplittingIntoTriplets($numberToTripletsConverter, $tripletTransformer)
            ->useRegularExponents($exponentInflector)
            ->build();

        return $numberTransformer->toWords($number);
    }
}
