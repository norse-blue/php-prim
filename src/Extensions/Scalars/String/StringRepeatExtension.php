<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\IntObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

/**
 * Class StringRepeatExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringRepeatExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(int|IntObject $times = 2): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Repeat a string n times.
         *
         * @param int|IntObject $times
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function ($times = 2): StringObject {
            $value = $this->object_value;
            $times = self::unwrap($times);
            $repeated = '';

            if ($value !== '') {
                for ($i = 0; $i < $times; $i++) {
                    $repeated .= $value;
                }
            }

            return string($repeated);
        };
    }
}
