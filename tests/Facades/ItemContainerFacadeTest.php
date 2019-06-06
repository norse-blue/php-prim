<?php

declare(strict_types=1);

namespace NorseBlue\Prim\Tests\Facades;

use Exception;
use NorseBlue\Prim\Exceptions\InvalidFacadeClassException;
use NorseBlue\Prim\Tests\Helpers\Facades\DummyNonItemContainerFacade;
use NorseBlue\Prim\Tests\TestCase;

class ItemContainerFacadeTest extends TestCase
{
    /** @test */
    public function facade_throws_exception_when_class_does_not_extend_item_container(): void
    {
        try {
            DummyNonItemContainerFacade::publicStaticDummy();
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidFacadeClassException::class, $e);

            return;
        }

        $this->fail(InvalidFacadeClassException::class . ' was not thrown.');
    }
}
