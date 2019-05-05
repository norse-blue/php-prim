<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;
use Ramsey\Uuid\UuidInterface;

/**
 * Class StringUuidTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringUuidTest extends TestCase
{
    /** @test */
    public function string_uuid()
    {
        $this->assertInstanceOf(UuidInterface::class, Str::uuid());
        $this->assertInstanceOf(UuidInterface::class, Str::orderedUuid());
    }
}
