<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use NorseBlue\Prim\Support\Character;
use function NorseBlue\Prim\string;

/**
 * Class StringAsciiExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
class StringAsciiExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $language = 'en'): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Transliterate a UTF-8 value to ASCII.
         *
         * @param string|StringObject $language
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($language = 'en'): StringObject {
            $value = $this->object_value;
            $language = self::unwrap($language);

            $languageSpecific = Character::languageSpecificCharsArray($language);

            if ($languageSpecific !== null) {
                $value = str_replace($languageSpecific[0], $languageSpecific[1], $value);
            }

            foreach (Character::charsArray() as $key => $val) {
                $value = str_replace($val, $key, $value);
            }

            return string(preg_replace('/[^\x20-\x7E]/u', '', $value));
        };
    }
}
