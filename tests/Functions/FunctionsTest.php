<?php

namespace NorseBlue\Prim\Tests\Functions;

use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\Functions\path_merge;

class FunctionsTest extends TestCase
{
    /** @test */
    public function path_merge_merges_as_intended()
    {
        $this->assertEquals('', path_merge('', ''));
        $this->assertEquals(
            DIRECTORY_SEPARATOR,
            path_merge('', '', DIRECTORY_SEPARATOR, true)
        );
        $this->assertEquals(
            DIRECTORY_SEPARATOR . 'Temp',
            path_merge(DIRECTORY_SEPARATOR, 'Temp')
        );
        $this->assertEquals(
            DIRECTORY_SEPARATOR . 'Temp' . DIRECTORY_SEPARATOR . 'Folder',
            path_merge(DIRECTORY_SEPARATOR, ['Temp', 'Folder'])
        );
    }
}
