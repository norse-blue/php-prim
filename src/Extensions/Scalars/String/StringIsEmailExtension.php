<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Extensions\Scalars\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Types\Scalars\BoolObject;
use NorseBlue\Prim\Types\Scalars\StringObject;
use function NorseBlue\Prim\Functions\bool;

/**
 * Class StringIsEmailExtension
 *
 * @package NorseBlue\Prim\Extensions\Scalars\String
 */
final class StringIsEmailExtension extends StringObject implements ExtensionMethod
{
    /**
     * @return callable(bool|BoolObject $email_unicode = false): BoolObject
     */
    public function __invoke(): callable
    {
        /**
         * Checks if the string is an email.
         *
         * @param bool|BoolObject $email_unicode
         *
         * @return \NorseBlue\Prim\Types\Scalars\BoolObject
         *
         * @see https://www.php.net/manual/en/function.filter-var.php
         */
        return function ($email_unicode = false): BoolObject {
            return bool(
                filter_var(
                    $this->object_value,
                    FILTER_VALIDATE_EMAIL,
                    BoolObject::unwrap($email_unicode) ? FILTER_FLAG_EMAIL_UNICODE : FILTER_FLAG_NONE
                ) !== false
            );
        };
    }
}
