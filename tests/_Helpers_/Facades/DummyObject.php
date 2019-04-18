<?php

namespace NorseBlue\Prim\Tests\_Helpers_\Facades;

/**
 * Class DummyObject
 *
 * @package NorseBlue\Prim\Tests\Unit\Facade
 */
class DummyObject
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
