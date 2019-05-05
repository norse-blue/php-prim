<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;

/**
 * Class IntObject
 *
 * @package NorseBlue\Prim\Scalars
 *
 * @method self abs() From extension method IntAbsExtension
 * @method self compare(int|IntObject|float|FloatObject $number) From extension method IntCompareExtension
 * @method BoolObject equals(int|IntObject|float|FloatObject $number) From extension method IntEqualsExtension
 */
class IntObject extends ImmutableValueObject
{
    /** @inheritDoc */
    protected static $extensions = [];

    // region === Overrides ===

    /**
     * IntObject constructor.
     *
     * @param int|IntObject|float|FloatObject $value
     */
    public function __construct($value = 0)
    {
        if ($this->valueIsValid($value)) {
            $value = (int)$value;
        }

        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    final public function valueIsValid($value): bool
    {
        return is_int($value) || is_float($value);
    }

    // endregion Overrides
}
