<?php

namespace NorseBlue\Prim\Tests\Unit\Facade;

use Exception;
use NorseBlue\Prim\Tests\_Helpers_\Facades\DummyCompleteFacade;
use NorseBlue\Prim\Tests\_Helpers_\Facades\DummyIncompleteFacade;
use NorseBlue\Prim\Tests\TestCase;
use RuntimeException;

/**
 * Class FacadeTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Facade
 */
class FacadeTest extends TestCase
{
    /** @test */
    public function facade_proxies_instance_functions_calls(): void
    {
        $this->assertEquals(3, DummyCompleteFacade::dummy());
    }

    /** @test */
    public function facade_proxies_static_functions_calls(): void
    {
        $this->assertEquals(9, DummyCompleteFacade::staticDummy());
    }

    /** @test */
    public function facade_throws_exception_when_no_valid_class_is_set(): void
    {
        try {
            DummyIncompleteFacade::dummy();
        } catch (Exception $e) {
            $this->assertInstanceOf(RuntimeException::class, $e);
            return;
        }

        $this->fail(RuntimeException::class . ' was not thrown.');
    }
}
