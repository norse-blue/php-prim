<?php

namespace NorseBlue\Prim\Extensions\Scalars\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use function NorseBlue\Prim\bool;

/**
 * Class BoolXorExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\Bool
 */
class BoolXorExtension extends BoolObject implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolObject|bool[]|BoolObject[] ...$bools): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Apply the XOR logical operation to the BoolObject with the given values.
         *
         * @param bool|BoolObject|bool[]|BoolObject[] ...$bools
         *
         * @return \NorseBlue\Prim\Scalars\BoolObject
         */
        return function (...$bools): BoolObject {
            $carry = $this->object_value;

            foreach ($bools as $bool) {
                $bool = self::unwrap($bool);

                $carry = ($carry xor (is_array($bool)
                        ? bool(array_shift($bool))->xor(...$bool)->value
                        : $bool
                    ));
            }

            return bool($carry);
        };
    }
}
