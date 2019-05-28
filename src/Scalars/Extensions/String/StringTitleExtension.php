<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**.
 * Class StringTitleExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
final class StringTitleExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Convert the given string to title case.
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function (): StringObject {
            $value = $this->object_value;

            return string(mb_convert_case($value, MB_CASE_TITLE, 'UTF-8'));
        };
    }
}
