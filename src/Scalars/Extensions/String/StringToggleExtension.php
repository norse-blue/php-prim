<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringToggleExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringToggleExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(array<string|StringObject> $options, bool|BoolObject $strict = false): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Toggles a string between two states.
         *
         * @param array<string|StringObject> $options
         * @param bool|BoolObject $strict Whether a string neither matching 1 or 2 should be changed
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function ($options, $strict = false): StringObject {
            $options = array_values($options);
            foreach ($options as &$option) {
                $option = self::unwrap($option);
            }

            $index = array_search($this->object_value, $options, true);
            if ($index === false) {
                if (BoolObject::unwrap($strict)) {
                    return string($this->object_value);
                }

                $index = -1;
            }

            return string($options[++$index % count($options)]);
        };
    }
}
