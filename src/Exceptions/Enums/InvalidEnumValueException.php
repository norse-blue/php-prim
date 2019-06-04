<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Exceptions\Enums;

use BadMethodCallException;

/**
 * Exception thrown when an invalid enum value is given.
 */
final class InvalidEnumValueException extends BadMethodCallException
{
}
