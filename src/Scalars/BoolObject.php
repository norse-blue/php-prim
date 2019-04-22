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
    public function valueIsValid($value): bool
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
    public function and(...$bools)
    {
        if ($this->value === false) {
            return bool(false);
        }

        foreach ($bools as $bool) {
            $bool =  self::unwrap($bool);

            if ($bool === false) {
                return bool(false);
            }

            if (is_array($bool)
                && bool(array_shift($bool))->and(...$bool)->value === false
            ) {
                return bool(false);
            }
        }

        return bool(true);
    }

    /**
     * Apply the NOT logical operation.
     *
     * @return \NorseBlue\Prim\Scalars\BoolObject
     */
    public function not(): BoolObject
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
    public function or(...$bools): BoolObject
    {
        if ($this->value === true) {
            return bool(true);
        }

        foreach ($bools as $bool) {
            $bool =  self::unwrap($bool);

            if ($bool === true) {
                return bool(true);
            }

            if (is_array($bool)
                && bool(array_shift($bool))->or(...$bool)->value === true
            ) {
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
    public function xor(...$bools)
    {
        $carry = $this->value;

        foreach ($bools as $bool) {
            $bool =  self::unwrap($bool);

            $carry = ($carry xor (is_array($bool)
                    ? bool(array_shift($bool))->xor(...$bool)->value
                    : $bool
                ));
        }

        return bool($carry);
    }
}
