<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;

/**
 * Class BoolObject
 *
 * @package NorseBlue\Prim\Scalars
 *
 * @method self and (bool|self|bool[]|self[] ...$bools) From extension method BoolAndExtension
 * @method self equals(bool|self $bool) From extension method BoolEqualsExtension
 * @method self not() From extension method BoolNotExtension
 * @method self or (bool|self|bool[]|self[] ...$bools) From extension method BoolOrExtension
 * @method self xor (bool|self|bool[]|self[] ...$bools) From extension method BoolXorExtension
 */
class BoolObject extends ImmutableValueObject
{
    /** @inheritDoc */
    protected static $extensions = [];

    // region === Overrides ===

    /**
     * BoolObject constructor.
     *
     * @param bool|BoolObject $value
     */
    public function __construct($value = false)
    {
        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    final public function valueIsValid($value): bool
    {
        return is_bool($value);
    }

    // endregion Overrides

    /**
     * Return true if the object value is false.
     *
     * @return bool
     */
    public function isFalse(): bool
    {
        return $this->equals(false)->value;
    }

    /**
     * Return true if the object value is true.
     *
     * @return bool
     */
    public function isTrue(): bool
    {
        return $this->equals(true)->value;
    }
}
