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
     * @param float|FloatObject $value
     */
    public function __construct($value = 0.0)
    {
        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    final public function valueIsValid($value): bool
    {
        return is_float($value);
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
     * @param $number
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    public function equals($number): BoolObject
    {
        return bool($this->compare($number)->value === 0.0);
    }
}
