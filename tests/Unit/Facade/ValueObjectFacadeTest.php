<?php

namespace NorseBlue\Prim\Tests\Unit\Facade;

use BadMethodCallException;
use Exception;
use NorseBlue\Prim\Exceptions\InvalidFacadeClassException;
use NorseBlue\Prim\Tests\_Helpers_\Facades\DummyCompleteFacade;
use NorseBlue\Prim\Tests\_Helpers_\Facades\DummyIncompleteFacade;
use NorseBlue\Prim\Tests\_Helpers_\Facades\DummyInvalidFacade;
use NorseBlue\Prim\Tests\_Helpers_\Facades\DummyNonValueObjectFacade;
use NorseBlue\Prim\Tests\_Helpers_\Facades\DummyValueObject;
use NorseBlue\Prim\Tests\TestCase;
use RuntimeException;

/**
 * Class ValueObjectFacadeTest
 *
 * @package NorseBlue\Prim\Tests\Unit\ValueObjectFacade
 */
class ValueObjectFacadeTest extends TestCase
{
    /** @test */
    public function facade_proxies_instance_functions_calls(): void
    {
        $obj = new DummyValueObject(3);
        $this->assertEquals(3, DummyCompleteFacade::dummy());
        $this->assertEquals(3, DummyCompleteFacade::unwrap($obj));
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
            DummyInvalidFacade::dummy();
        } catch (Exception $e) {
            $this->assertInstanceOf(RuntimeException::class, $e);
            return;
        }

        $this->fail(RuntimeException::class . ' was not thrown.');
    }

    /** @test */
    public function facade_throws_exception_when_no_method_exists_for_class(): void
    {
        try {
            DummyCompleteFacade::nonexistent();
        } catch (Exception $e) {
            $this->assertInstanceOf(BadMethodCallException::class, $e);
            return;
        }

        $this->fail(BadMethodCallException::class . ' was not thrown.');
    }

    /** @test */
    public function facade_throws_exception_when_class_does_not_extend_value_object(): void
    {
        try {
            DummyNonValueObjectFacade::dummy();
        } catch (Exception $e) {
            $this->assertInstanceOf(InvalidFacadeClassException::class, $e);
            return;
        }

        $this->fail(InvalidFacadeClassException::class . ' was not thrown.');
    }
}
