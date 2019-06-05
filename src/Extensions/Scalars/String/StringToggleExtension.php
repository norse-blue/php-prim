<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

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
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($options, $strict = false): StringObject {
            $options = array_values($options);
            foreach ($options as &$option) {
                $option = self::unwrap($option);
            }

            $index = array_search($this->value, $options, true);
            if ($index === false) {
                if (BoolObject::unwrap($strict)) {
                    return string($this->value);
                }

                $index = -1;
            }

            $index++;

            return string($options[$index % count($options)]);
        };
    }
}
