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
     * Get the absolute value.
     *
     * @return \NorseBlue\Prim\Scalars\IntObject
     */
    public function abs(): self
    {
        return int(abs($this->object_value));
    }

    /**
     * Compare the object against a given value.
     * If a float is given, it cast as int before doing the comparison.
     *
     * @param int|IntObject|float|FloatObject $number
     *
     * @return \NorseBlue\Prim\Scalars\IntObject
     */
    public function compare($number): self
    {
        $number = self::unwrap($number);

        if (is_float($number)) {
            $number = (int)$number;
        }

        return int($this->object_value - $number);
    }

    /**
     * Compare the object against a given value for equality.
     *
     * @param int|IntObject|float|FloatObject $number
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    public function equals($number): BoolObject
    {
        return bool($this->compare($number)->value === 0);
    }
}
