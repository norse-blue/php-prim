<?php

namespace NorseBlue\Prim\Tests\Types\Collections;

use NorseBlue\Prim\Types\Collections\DotArrObject;
use NorseBlue\Prim\Tests\TestCase;
use function NorseBlue\Prim\Functions\dotarr;

/**
 * Class DotArrObjectTest
 *
 * @package NorseBlue\Prim\Tests\Unit\Collections
 */
class DotArrObjectTest extends TestCase
{
    /** @test */
    public function dot_array_can_be_created_empty_by_default()
    {
        $arr = new DotArrObject;

        $this->assertEquals([], $arr->all());
    }

    /** @test */
    public function dot_array_can_be_created_with_function()
    {
        $arr = dotarr();

        $this->assertEquals([], $arr->all());
    }

    /** @test */
    public function dot_array_can_be_created_with_one_dimensional_value()
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
        $arr = dotarr($original);

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
    public function dot_array_can_be_created_with_one_multi_dimensional_value()
    {
        $original = [
            'a' => [
                'b' => [
                    'c' => [
                        'd' => [
                            'e' => [
                                'f' => [
                                    'g' => [
                                        'h' => [
                                            'i' => 'value of a.b.c.d.e.f.g.h.i',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $output = $original;
        $output['a']['b']['c']['d']['e']['f']['g']['h']['i'] = ['j' => ['k' => 'value of k']];

        // create
        $arr = dotarr($original);

        // set
        $arr->set('a.b.c.d.e.f.g.h.i.j', 'value of j');
        $arr['a.b.c.d.e.f.g.h.i.j.k'] = 'value of k';

        // has, get
        $this->assertEquals($output, $arr->all());
        $this->assertTrue($arr->has('a'));
        $this->assertTrue(isset($arr['a']));
        $this->assertEquals($output['a'], $arr->get('a'));
        $this->assertEquals($output['a'], $arr['a']);
        $this->assertTrue($arr->has('a.b'));
        $this->assertTrue(isset($arr['a.b']));
        $this->assertEquals($output['a']['b'], $arr->get('a.b'));
        $this->assertEquals($output['a']['b'], $arr['a.b']);
        $this->assertTrue($arr->has('a.b.c'));
        $this->assertTrue(isset($arr['a.b.c']));
        $this->assertEquals($output['a']['b']['c'], $arr->get('a.b.c'));
        $this->assertEquals($output['a']['b']['c'], $arr['a.b.c']);
        $this->assertTrue($arr->has('a.b.c.d'));
        $this->assertTrue(isset($arr['a.b.c.d']));
        $this->assertEquals($output['a']['b']['c']['d'], $arr->get('a.b.c.d'));
        $this->assertEquals($output['a']['b']['c']['d'], $arr['a.b.c.d']);
        $this->assertTrue($arr->has('a.b.c.d.e'));
        $this->assertTrue(isset($arr['a.b.c.d.e']));
        $this->assertEquals($output['a']['b']['c']['d']['e'], $arr->get('a.b.c.d.e'));
        $this->assertEquals($output['a']['b']['c']['d']['e'], $arr['a.b.c.d.e']);
        $this->assertTrue($arr->has('a.b.c.d.e.f'));
        $this->assertTrue(isset($arr['a.b.c.d.e.f']));
        $this->assertEquals($output['a']['b']['c']['d']['e']['f'], $arr->get('a.b.c.d.e.f'));
        $this->assertEquals($output['a']['b']['c']['d']['e']['f'], $arr['a.b.c.d.e.f']);
        $this->assertTrue($arr->has('a.b.c.d.e.f.g'));
        $this->assertTrue(isset($arr['a.b.c.d.e.f.g']));
        $this->assertEquals($output['a']['b']['c']['d']['e']['f']['g'], $arr->get('a.b.c.d.e.f.g'));
        $this->assertEquals($output['a']['b']['c']['d']['e']['f']['g'], $arr['a.b.c.d.e.f.g']);
        $this->assertTrue($arr->has('a.b.c.d.e.f.g.h'));
        $this->assertTrue(isset($arr['a.b.c.d.e.f.g.h']));
        $this->assertEquals($output['a']['b']['c']['d']['e']['f']['g']['h'], $arr->get('a.b.c.d.e.f.g.h'));
        $this->assertEquals($output['a']['b']['c']['d']['e']['f']['g']['h'], $arr['a.b.c.d.e.f.g.h']);
        $this->assertTrue($arr->has('a.b.c.d.e.f.g.h.i'));
        $this->assertTrue(isset($arr['a.b.c.d.e.f.g.h.i']));
        $this->assertEquals($output['a']['b']['c']['d']['e']['f']['g']['h']['i'], $arr->get('a.b.c.d.e.f.g.h.i'));
        $this->assertEquals($output['a']['b']['c']['d']['e']['f']['g']['h']['i'], $arr['a.b.c.d.e.f.g.h.i']);
        $this->assertTrue($arr->has('a.b.c.d.e.f.g.h.i.j'));
        $this->assertTrue(isset($arr['a.b.c.d.e.f.g.h.i.j']));
        $this->assertEquals(
            $output['a']['b']['c']['d']['e']['f']['g']['h']['i']['j'],
            $arr->get('a.b.c.d.e.f.g.h.i.j')
        );
        $this->assertEquals(
            $output['a']['b']['c']['d']['e']['f']['g']['h']['i']['j'],
            $arr['a.b.c.d.e.f.g.h.i.j']
        );
        $this->assertTrue($arr->has('a.b.c.d.e.f.g.h.i.j.k'));
        $this->assertEquals(
            $output['a']['b']['c']['d']['e']['f']['g']['h']['i']['j']['k'],
            $arr->get('a.b.c.d.e.f.g.h.i.j.k')
        );
        $this->assertEquals(
            $output['a']['b']['c']['d']['e']['f']['g']['h']['i']['j']['k'],
            $arr['a.b.c.d.e.f.g.h.i.j.k']
        );

        // delete
        $arr->delete('a.b.c.d.e.f.g.h.i.j.k');
        $this->assertFalse($arr->has('a.b.c.d.e.f.g.h.i.j.k'));
        $this->assertFalse(isset($arr['a.b.c.d.e.f.g.h.i.j.k']));
        $this->assertEquals([], $arr->get('a.b.c.d.e.f.g.h.i.j'));
        $this->assertEquals([], $arr['a.b.c.d.e.f.g.h.i.j']);
        unset($arr['a.b.c.d.e.f.g.h.i.j']);
        $this->assertFalse($arr->has('a.b.c.d.e.f.g.h.i.j'));
        $this->assertFalse(isset($arr['a.b.c.d.e.f.g.h.i.j']));
        $this->assertEquals([], $arr->get('a.b.c.d.e.f.g.h.i'));
        $this->assertEquals([], $arr['a.b.c.d.e.f.g.h.i']);

        // clear
        $arr->clear();
        $this->assertEquals([], $arr->all());
    }

    /** @test */
    public function dot_array_converts_to_json()
    {
        $original = ['a' => 'value of a', 'b' => ['c' => ['d' => ' value of a.b.c.d']]];
        $arr = dotarr($original);

        $this->assertEquals($original, json_decode($arr->toJson(), true));
    }

    /** @test */
    public function dots_in_key_are_handled_correctly()
    {
        $arr = dotarr(['a' => 'value of a', 'b' => ['c' => ['d' => ' value of a.b.c.d']]]);

        $this->assertTrue($arr->has('b.c.d'));
        $this->assertTrue($arr->has('b...c.d'));
        $this->assertTrue($arr->has('b.c...d'));
        $this->assertTrue($arr->has('b...c...d'));

        $this->assertTrue($arr->has('.b.c.d'));
        $this->assertTrue($arr->has('...b.c.d'));
        $this->assertTrue($arr->has('.....b.c.d'));

        $this->assertFalse($arr->has('b.c.d.'));
        $this->assertFalse($arr->has('b.c.d...'));
        $this->assertFalse($arr->has('b.c.d.....'));
    }
}
