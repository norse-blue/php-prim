<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Facades\Scalars;

use NorseBlue\Prim\Facades\ValueObjectFacade;
use NorseBlue\Prim\Types\Scalars\BoolObject;

/**
 * Class BoolFacade
 *
 * @package NorseBlue\Prim\Facades\Scalars
 *
 * @method static BoolObject and(bool|BoolObject $value, bool|BoolObject|array<bool|BoolObject> ...$bools)
 * @method static BoolObject equals(bool|BoolObject $value, bool|BoolObject $bool)
 * @method static BoolObject not(bool|BoolObject $value)
 * @method static BoolObject or(bool|BoolObject $value, bool|BoolObject|array<bool|BoolObject> ...$bools)
 * @method static BoolObject xor(bool|BoolObject $value, bool|BoolObject|array<bool|BoolObject> ...$bools)
 */
final class BoolFacade extends ValueObjectFacade
{
    /** @inheritDoc */
    protected static $class = BoolObject::class;
}
