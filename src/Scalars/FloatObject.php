<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;
use function NorseBlue\Prim\bool;
use function NorseBlue\Prim\float;

/**
 * Class FloatObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class FloatObject extends ImmutableValueObject
{
    // region === Overrides ===

    /**
     * FloatObject constructor.
     *
     * @param float|FloatObject|int|IntObject $value
     */
    public function __construct($value = 0.0)
    {
        if ($this->valueIsValid($value)) {
            $value = (float)$value;
        }

        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    final public function valueIsValid($value): bool
    {
        return is_float($value) || is_int($value);
    }

    // endregion Overrides

    /**
     * Compare the object against a given value.
     *
     * @param int|IntObject|float|FloatObject $number
     *
     * @return \NorseBlue\Prim\Scalars\FloatObject
     */
    public function compare($number): self
    {
        $number = self::unwrap($number);

        return float($this->object_value - $number);
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
        return bool($this->compare($number)->value === 0.0);
    }
}
