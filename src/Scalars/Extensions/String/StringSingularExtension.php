<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use Doctrine\Common\Inflector\Inflector;
use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\string;

/**
 * Class StringSingularExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
 */
class StringSingularExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(): StringObject
     */
    public function __invoke(): callable
    {
        /**
         * Get the singular form of an English word.
         *
         * @return \NorseBlue\Prim\Scalars\StringObject
         */
        return function (): StringObject {
            return string(Inflector::singularize($this->object_value));
        };
    }
}
