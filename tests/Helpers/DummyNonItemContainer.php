<?php

namespace NorseBlue\Prim\Tests\Helpers;

class DummyNonItemContainer
{
    /** @var int The private dummy value */
    private $dummyPrivate = 1;

    /** @var int The protected dummy value */
    protected $dummyProtected = 2;

    /** @var int The public dummy value */
    public $dummyPublic = 3;

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
        return $this->dummyPrivate;
    }

    /**
     * Get the protected dummy value.
     *
     * @return int
     */
    public function protectedDummy(): int
    {
        return $this->dummyProtected;
    }

    /**
     * Get the public dummy value.
     *
     * @return int
     */
    public function publicDummy(): int
    {
        return $this->dummyPublic;
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
}
