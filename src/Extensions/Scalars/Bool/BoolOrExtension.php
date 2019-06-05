<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\Bool;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use function NorseBlue\Prim\Functions\bool;

final class BoolOrExtension extends BoolObject implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolObject|array<bool|BoolObject> ...$bools): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Apply the OR logical operation to the BoolObject with the given values.
         *
         * @param bool|BoolObject|array<bool|BoolObject> ...$bools
         *
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         */
        return function (...$bools): BoolObject {
            if ($this->value === true) {
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
