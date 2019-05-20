<?php

namespace NorseBlue\Prim\Tests\Unit\Collections;

use Exception;
use NorseBlue\Prim\Collections\Arr;
use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\arr;
use OutOfBoundsException;

/**
 * Class ArrTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Collections
 */
class ArrTest extends TestCase
{
    /** @test */
    public function simple_array_can_be_created_empty_by_default()
    {
        $arr = new Arr;

        $this->assertEquals([], $arr->all());
    }

    /** @test */
    public function simple_array_can_be_created_with_function()
    {
        $arr = arr();

        $this->assertEquals([], $arr->all());
    }

    /** @test */
    public function simple_array_can_be_created_with_value()
    {
        $original = [
            'a' => 'value of a',
            'b' => 'value of b',
            'c' => 'value of c',
            'd' => 'value of d',
            'e' => 'value of e',
            'f' => 'value of f',
            'g' => 'value of g',
            'h' => 'value of h',
            'i' => 'value of i',
        ];
        $output = array_merge($original, [
            'j' => 'value of j',
            'k' => 'value of k',
        ]);

        // create
        $arr = arr($original);

        // set
        $arr->set('j', 'value of j');
        $arr['k'] = 'value of k';

        // has, get
        $this->assertEquals($output, $arr->all());
        $this->assertTrue($arr->has('a'));
        $this->assertTrue(isset($arr['a']));
        $this->assertEquals('value of a', $arr->get('a'));
        $this->assertEquals('value of a', $arr['a']);
        $this->assertTrue($arr->has('b'));
        $this->assertTrue(isset($arr['b']));
        $this->assertEquals('value of b', $arr->get('b'));
        $this->assertEquals('value of b', $arr['b']);
        $this->assertTrue($arr->has('c'));
        $this->assertTrue(isset($arr['c']));
        $this->assertEquals('value of c', $arr->get('c'));
        $this->assertEquals('value of c', $arr['c']);
        $this->assertTrue($arr->has('d'));
        $this->assertTrue(isset($arr['d']));
        $this->assertEquals('value of d', $arr->get('d'));
        $this->assertEquals('value of d', $arr['d']);
        $this->assertTrue($arr->has('e'));
        $this->assertTrue(isset($arr['e']));
        $this->assertEquals('value of e', $arr->get('e'));
        $this->assertEquals('value of e', $arr['e']);
        $this->assertTrue($arr->has('f'));
        $this->assertTrue(isset($arr['f']));
        $this->assertEquals('value of f', $arr->get('f'));
        $this->assertEquals('value of f', $arr['f']);
        $this->assertTrue($arr->has('g'));
        $this->assertTrue(isset($arr['g']));
        $this->assertEquals('value of g', $arr->get('g'));
        $this->assertEquals('value of g', $arr['g']);
        $this->assertTrue($arr->has('h'));
        $this->assertTrue(isset($arr['h']));
        $this->assertEquals('value of h', $arr->get('h'));
        $this->assertEquals('value of h', $arr['h']);
        $this->assertTrue($arr->has('i'));
        $this->assertTrue(isset($arr['i']));
        $this->assertEquals('value of i', $arr->get('i'));
        $this->assertEquals('value of i', $arr['i']);
        $this->assertTrue($arr->has('j'));
        $this->assertTrue(isset($arr['j']));
        $this->assertEquals('value of j', $arr->get('j'));
        $this->assertEquals('value of j', $arr['j']);
        $this->assertTrue($arr->has('k'));
        $this->assertTrue(isset($arr['k']));
        $this->assertEquals('value of k', $arr->get('k'));
        $this->assertEquals('value of k', $arr['k']);

        // delete
        $arr->delete('k');
        $this->assertFalse($arr->has('k'));
        $this->assertFalse(isset($arr['k']));
        unset($arr['j']);
        $this->assertFalse($arr->has('j'));
        $this->assertFalse(isset($arr['j']));

        // clear
        $arr->clear();
        $this->assertEquals([], $arr->all());
    }

    /** @test */
    public function simple_array_works_with_int_and_string_keys()
    {
        $arr = new Arr;

        $arr->set('a', 'a value');
        $arr->set(1, 'one value');

        $this->assertEquals(['a' => 'a value', 1 => 'one value'], $arr->all());
    }

    /** @test */
    public function simple_array_treats_int_and_string_int_keys_as_same()
    {
        $arr = new Arr;

        $arr->set(1, '1 value');
        $arr->set('1', 'one value');

        $this->assertEquals([1 => 'one value'], $arr->all());
    }

    /** @test */
    public function simple_array_converts_to_json()
    {
        $original = ['a' => 'value of a', 'b' => ['c' => ['d' => ' value of a.b.c.d']]];
        $arr = arr($original);

        $this->assertEquals($original, json_decode($arr->toJson(), true));
    }

    /** @test */
    public function simple_array_treats_dot_string_as_normal_string_key()
    {
        $arr = new Arr;

        $arr->set('a.b.c', 'the value');

        $this->assertEquals(['a.b.c' => 'the value'], $arr->all());
    }

    /** @test */
    public function throws_an_exception_when_getting_unknown_key_from_simple_array()
    {
        $arr = new Arr;

        try {
            $arr->get('unknown');
        } catch (Exception $e) {
            $this->assertInstanceOf(OutOfBoundsException::class, $e);
            return;
        }

        $this->fail(OutOfBoundsException::class . ' was not thrown.');
    }

    /** @test */
    public function simple_array_is_countable()
    {
        $empty_arr = new Arr;
        $arr1 = arr(['a' => 1, 'b' => 2, 'c' => 3]);
        $arr2 = arr(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5]);

        $this->assertCount(0, $empty_arr);
        $this->assertCount(3, $arr1);
        $this->assertCount(5, $arr2);
    }
}
