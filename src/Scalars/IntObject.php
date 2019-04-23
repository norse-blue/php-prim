<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;
use function NorseBlue\Prim\bool;
use function NorseBlue\Prim\int;

/**
 * Class IntObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class IntObject extends ImmutableValueObject
{
    // region === Overrides ===

    /**
     * IntObject constructor.
     *
     * @param int |IntObject $value
     */
    public function __construct($value = 0)
    {
        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    final public function valueIsValid($value): bool
    {
        return is_int($value);
    }

    // endregion Overrides

    /**
     * Compare the object against a given value.
     *
     * @param int|IntObject|float|FloatObject $value
     *
     * @return \NorseBlue\Prim\Scalars\IntObject
     */
    public function compare($value): self
    {
        $value = self::unwrap($value);

        return int($this->object_value - $value);
    }

    public function equals($value): BoolObject
    {
        return bool($this->compare($value)->value === 0);
    }
}
