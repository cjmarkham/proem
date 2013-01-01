<?php

/**
 * The MIT License
 *
 * Copyright (c) 2010 - 2013 Tony R Quilkey <trq@proemframework.org>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Proem\Util\Structure\Tests;

/**
 * @namespace Proem\Test\Util\Structure
 */
namespace Proem\Test\Util\Structure;

use Proem\Util\Structure\PriorityQueue;

class PriorityQueueTest extends \PHPUnit_Framework_TestCase
{
    public function testCanInstantiate()
    {
        $q = new PriorityQueue;
        $this->assertInstanceOf('Proem\Util\Structure\PriorityQueue', $q);
    }

    public function testSamePriorityWorksAsFIFO()
    {
        $results = '';
        $q = new PriorityQueue;
        $q->insert('a', 1);
        $q->insert('b', 1);
        $q->insert('c', 1);

        foreach ($q as $v) {
            $results .= $v;
        }

        $this->assertEquals('abc', $results);
    }

    public function testPriority()
    {
        $results = '';
        $q = new PriorityQueue;
        $q->insert('a', 100);
        $q->insert('b', 200);
        $q->insert('c', 50);

        foreach ($q as $v) {
            $results .= $v;
        }

        $this->assertEquals('bac', $results);
    }

    public function testCanReplayQueue()
    {
        $results = '';
        $q = new PriorityQueue;
        $q->insert('a', 1);
        $q->insert('b', 1);
        $q->insert('c', 1);

        foreach ($q as $v) {
            $results .= $v;
        }

        foreach ($q as $v) {
            $results .= $v;
        }

        $this->assertEquals('abcabc', $results);
    }
}
