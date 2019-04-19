<?php

namespace NorseBlue\Prim\Tests\Unit\Scalars\String;

use NorseBlue\Prim\Facades\Scalars\StringFacade as Str;
use NorseBlue\Prim\Tests\TestCase;

class StringSnakeTest extends TestCase
{
    /** @test */
    public function string_snake()
    {
        $this->assertEquals('laravelphpframework', Str::snake('laravelphpframework'));
        $this->assertEquals('laravel_php_framework', Str::snake('laravel_php_framework'));

        $this->assertEquals('laravel_p_h_p_framework', Str::snake('LaravelPHPFramework'));
        $this->assertEquals('laravel_php_framework', Str::snake('LaravelPhpFramework'));
        $this->assertEquals('laravel php framework', Str::snake('LaravelPhpFramework', ' '));
        $this->assertEquals('laravel_php_framework', Str::snake('Laravel Php Framework'));
        $this->assertEquals('laravel_php_framework', Str::snake('Laravel    Php      Framework   '));

        // ensure cache keys don't overlap
        $this->assertEquals('laravel__php__framework', Str::snake('LaravelPhpFramework', '__'));
        $this->assertEquals('laravel_php_framework_', Str::snake('LaravelPhpFramework_', '_'));
        $this->assertEquals('laravel_php_framework', Str::snake('laravel php Framework'));
        $this->assertEquals('laravel_php_frame_work', Str::snake('laravel php FrameWork'));
    }
}
