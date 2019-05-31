<?php

namespace NorseBlue\Prim\Tests\Types\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

/**
 * Class StringSnakeTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Scalars\String
 */
class StringSnakeTest extends TestCase
{
    /** @test */
    public function string_snake()
    {
        $this->assertEquals('laravelphpframework', Str::snake('laravelphpframework')->value);
        $this->assertEquals('laravel_php_framework', Str::snake('laravel_php_framework')->value);

        $this->assertEquals('laravel_p_h_p_framework', Str::snake('LaravelPHPFramework')->value);
        $this->assertEquals('laravel_php_framework', Str::snake('LaravelPhpFramework')->value);
        $this->assertEquals('laravel php framework', Str::snake('LaravelPhpFramework', ' ')->value);
        $this->assertEquals('laravel_php_framework', Str::snake('Laravel Php Framework')->value);
        $this->assertEquals('laravel_php_framework', Str::snake('Laravel    Php      Framework   ')->value);

        // ensure cache keys don't overlap
        $this->assertEquals('laravel__php__framework', Str::snake('LaravelPhpFramework', '__')->value);
        $this->assertEquals('laravel_php_framework_', Str::snake('LaravelPhpFramework_', '_')->value);
        $this->assertEquals('laravel_php_framework', Str::snake('laravel php Framework')->value);
        $this->assertEquals('laravel_php_frame_work', Str::snake('laravel php FrameWork')->value);
    }
}
