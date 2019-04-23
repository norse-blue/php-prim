<?php

namespace NorseBlue\Prim\Scalars;

use NorseBlue\Prim\ImmutableValueObject;
use function NorseBlue\Prim\bool;

/**
 * Class BoolObject
 *
 * @package NorseBlue\Prim\Scalars
 */
class BoolObject extends ImmutableValueObject
{
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
     * Apply the AND logical operation to the BoolObject with the given values.
     *
     * @param bool|BoolObject|array<bool|BoolObject> ...$bools
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    public function and(...$bools): self
    {
        if ($this->value === false) {
            return bool(false);
        }

        foreach ($bools as $bool) {
            $bool = self::unwrap($bool);

            if ($bool === false) {
                return bool(false);
            }

            if (is_array($bool) && bool(array_shift($bool))->and(...$bool)->value === false) {
                return bool(false);
            }
        }

        return bool(true);
    }

    /**
     * Compare the object against a given value for equality.
     *
     * @param bool|BoolObject $value
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    public function equals($value): self
    {
        $value = self::unwrap($value);

        return bool($this->value === $value);
    }

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

    /**
     * Apply the NOT logical operation.
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    public function not(): self
    {
        return bool(!$this->value);
    }

    /**
     * Apply the OR logical operation to the BoolObject with the given values.
     *
     * @param bool|BoolObject|array<bool|BoolObject> ...$bools
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    public function or(...$bools): self
    {
        if ($this->value === true) {
            return bool(true);
        }

        foreach ($bools as $bool) {
            $bool = self::unwrap($bool);

            if ($bool === true) {
                return bool(true);
            }

            if (is_array($bool) && bool(array_shift($bool))->or(...$bool)->value === true) {
                return bool(true);
            }
        }

        return bool(false);
    }

    /**
     * Apply the XOR logical operation to the BoolObject with the given values.
     *
     * @param bool|BoolObject|array<bool|BoolObject> ...$bools
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    public function xor(...$bools): self
    {
        $carry = $this->value;

        foreach ($bools as $bool) {
            $bool = self::unwrap($bool);

            $carry = ($carry xor (is_array($bool)
                    ? bool(array_shift($bool))->xor(...$bool)->value
                    : $bool
                ));
        }

        return bool($carry);
    }
}
