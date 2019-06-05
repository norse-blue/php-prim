<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Types\Scalars;

use NorseBlue\Prim\Types\ImmutableValueObject;
use NorseBlue\Prim\Types\ValueObject;

/**
 * Primitive type bool as object.
 *
 * @method self and(bool|self|array<bool|self> ...$bools) @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolAndExtension
 * @method self equals(bool|self $bool) @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolEqualsExtension
 * @method self not() @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolNotExtension
 * @method self or(bool|self|array<bool|self> ...$bools) @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolOrExtension
 * @method self xor(bool|self|array<bool|self> ...$bools) @see \NorseBlue\Prim\Extensions\Scalars\Bool\BoolXorExtension
 */
class BoolObject extends ImmutableValueObject
{
    // region === Properties ===

    /** @inheritDoc */
    protected static $extensions = [];

    /** @var array<string> The guarded extension methods. */
    protected static $guarded_extensions = [
        'and',
        'equals',
        'not',
        'or',
        'xor',
    ];

    // endregion Properties

    // region === Overrides ===

    /**
     * @param bool|BoolObject $value
     */
    public function __construct($value = false)
    {
        parent::__construct($value);
    }

    /**
     * @param bool|BoolObject $value
     *
     * @return self
     */
    public static function create($value = false): ValueObject
    {
        return new static($value);
    }

    /**
     * @inheritDoc
     */
    final public function valueIsValid($value): bool
    {
        return is_bool($value);
    }

    // endregion Overrides

    // region === Methods ===

    /**
     * Return true if the object value is false.
     *
     * @return bool
     */
    final public function isFalse(): bool
    {
        return $this->equals(false)->value;
    }

    /**
     * Return true if the object value is true.
     *
     * @return bool
     */
    final public function isTrue(): bool
    {
        return $this->equals(true)->value;
    }

    // endregion Methods
}
