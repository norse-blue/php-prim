<?php

namespace NorseBlue\Prim\Tests\_Helpers_\Facades;

use NorseBlue\Prim\ValueObject;

/**
 * Class DummyValueObject
 *
 * @package NorseBlue\Prim\Tests\Unit\ValueObjectFacade
 */
class DummyValueObject extends ValueObject
{
    /** @var int The dummy value. */
    protected $dummyValue = 3;

    /** @var int The static dummy value */
    protected static $staticDummyValue = 9;

    /**
     * Instance function.
     *
     * @return int
     */
    public function dummy(): int
    {
        return $this->dummyValue;
    }

    /**
     * Static function.
     *
     * @return int
     */
    public static function staticDummy(): int
    {
        return self::$staticDummyValue;
    }
}
