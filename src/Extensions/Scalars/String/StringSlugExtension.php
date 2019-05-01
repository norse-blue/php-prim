<?php

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

class StringSlugExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(string|StringObject $separator = '-', string|StringObject|null $language = 'en')
     */
    public function __invoke(): callable
    {
        /**
         * Generate a URL friendly "slug" from a given string.
         *
         * @param string|StringObject $separator
         * @param string|StringObject|null $language
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($separator = '-', $language = 'en'): StringObject {
            $title = $language ? $this->ascii($language)->value : $this->value;
            $separator = self::unwrap($separator);

            // Convert all dashes/underscores into separator
            $flip = $separator === '-' ? '_' : '-';

            $title = preg_replace('![' . preg_quote($flip, '!') . ']+!u', $separator, $title);

            // Replace @ with the word 'at'
            $title = str_replace('@', $separator . 'at' . $separator, $title);

            // Remove all characters that are not the separator, letters, numbers, or whitespace.
            $title = preg_replace(
                '![^' . preg_quote($separator, '!') . '\pL\pN\s]+!u',
                '',
                string($title)->lower()->value
            );

            // Replace all separator characters and whitespace by a single separator
            $title = preg_replace('![' . preg_quote($separator, '!') . '\s]+!u', $separator, $title);

            return string(trim($title, $separator));
        };
    }
}
