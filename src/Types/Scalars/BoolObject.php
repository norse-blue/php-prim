<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Scalars;

use NorseBlue\Prim\Types\ImmutableValueObject;

/**
 * Class BoolObject
 *
 * @package NorseBlue\Prim\Types\Scalars
 *
 * @method self and(bool|self|array<bool|self> ...$bools)
 * @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolAndExtension
 * @method self equals(bool|self $bool)
 * @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolEqualsExtension
 * @method self not()
 * @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolNotExtension
 * @method self or(bool|self|array<bool|self> ...$bools)
 * @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolOrExtension
 * @method self xor(bool|self|array<bool|self> ...$bools)
 * @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolXorExtension
 */
class BoolObject extends ImmutableValueObject
{
    /** @inheritDoc */
    protected static $extensions = [];

    /** @inheritDoc */
    protected static $guarded_extensions = [
        'and',
        'equals',
        'not',
        'or',
        'xor',
    ];

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
