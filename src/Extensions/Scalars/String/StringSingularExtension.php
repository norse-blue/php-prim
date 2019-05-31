<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use Doctrine\Common\Inflector\Inflector;
use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\string;

/**
 * Class StringSingularExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringSingularExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the singular form of an English word.
         *
         * @return \NorseBlue\Prim\Types\Scalars\StringObject
         */
        return function (): StringObject {
            return string(Inflector::singularize($this->object_value));
        };
    }
}
