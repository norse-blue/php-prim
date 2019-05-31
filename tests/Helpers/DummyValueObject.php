<?php

namespace NorseBlue\Prim\Tests\Helpers;

use NorseBlue\Prim\Types\ValueObject;

/**
 * Class DummyValueObject
 *
 * @package NorseBlue\Prim\Tests\Unit\ValueObjectFacade
 *
 * @property int $privateDummy
 * @property int $protectedDummy
 * @property int $publicDummy
 */
class DummyValueObject extends ValueObject
{
    /** @var int The private dummy value */
    private $privateDummy = 1;

    /** @var int The protected dummy value */
    protected $protectedDummy = 2;

    /** @var int The public dummy value */
    public $publicDummy = 3;

    /** @var int The static dummy value */
    private static $staticPrivateDummy = 4;

    /** @var int The static dummy value */
    protected static $staticProtectedDummy = 5;

    /** @var int The static dummy value */
    public static $staticPublicDummy = 6;

    /**
     * Get the private dummy value.
     *
     * @return int
     */
    public function privateDummy(): int
    {
        return $this->privateDummy;
    }

    /**
     * Get the protected dummy value.
     *
     * @return int
     */
    public function protectedDummy(): int
    {
        return $this->protectedDummy;
    }

    /**
     * Get the public dummy value.
     *
     * @return int
     */
    public function publicDummy(): int
    {
        return $this->publicDummy;
    }

    /**
     * Get the private static dummy value.
     *
     * @return int
     */
    public function privateStaticDummy(): int
    {
        return self::$staticPrivateDummy;
    }

    /**
     * Get the protected static dummy value.
     *
     * @return int
     */
    public function protectedStaticDummy(): int
    {
        return self::$staticProtectedDummy;
    }

    /**
     * Get the public static dummy value.
     *
     * @return int
     */
    public function publicStaticDummy(): int
    {
        return self::$staticPublicDummy;
    }

    /**
     * Private dummy property accessor.
     *
     * @return int
     */
    public function getPrivateDummyProperty(): int
    {
        return $this->privateDummy;
    }

    /**
     * Private dummy property mutator.
     *
     * @return int
     */
    public function setPrivateDummyProperty($value): int
    {
        $this->privateDummy = $value;
    }
}
