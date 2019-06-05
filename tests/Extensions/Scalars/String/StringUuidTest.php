<?php

namespace NorseBlue\Prim\Tests\Extensions\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;
use Ramsey\Uuid\UuidInterface;

class StringUuidTest extends TestCase
{
    /** @test */
    public function string_uuid()
    {
        $this->assertInstanceOf(UuidInterface::class, Str::uuid());
        $this->assertInstanceOf(UuidInterface::class, Str::orderedUuid());
    }
}
