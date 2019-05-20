<?php

namespace NorseBlue\Prim\Scalars\Extensions\String;

use NorseBlue\ExtensibleObjects\Contracts\ExtensionMethod;
use NorseBlue\Prim\Scalars\BoolObject;
use NorseBlue\Prim\Scalars\StringObject;
use function NorseBlue\Prim\bool;

/**
 * Class StringIsEmailExtension
 *
 * @package NorseBlue\Prim\Scalars\Extensions\String
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
         * @return \NorseBlue\Prim\Scalars\BoolObject
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
