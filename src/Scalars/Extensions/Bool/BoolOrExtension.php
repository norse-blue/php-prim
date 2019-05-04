<?php

namespace NorseBlue\Prim\Scalars\Extensions\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use function NorseBlue\Prim\bool;

/**
 * Class BoolOrExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\Bool
 */
class BoolOrExtension extends BoolObject implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolObject|bool[]|BoolObject[] ...$bools): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Apply the OR logical operation to the BoolObject with the given values.
         *
         * @param bool|BoolObject|bool[]|BoolObject[] ...$bools
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         */
        return function (...$bools): BoolObject {
            if ($this->object_value === true) {
                return bool(true);
            }

            foreach ($bools as $bool) {
                $bool = self::unwrap($bool);

                if ($bool === true) {
                    return bool(true);
                }

                if (is_array($bool)) {
                    return bool(array_shift($bool))->or(...$bool);
                }
            }

            return bool(false);
        };
    }
}
