<?php
/*
 * Copyright (c) 2012 Elnur Abdurrakhimov
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
namespace Elnur\Bundle\TwigExtensionsBundle\Tests\Twig\Extension;

require_once __DIR__ . '/../../../Twig/Extension/StringExtension.php';

use PHPUnit_Framework_TestCase;

class StringExtensionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validStartsWithData
     *
     * @param string $haystack
     * @param string $needle
     */
    public function testValidStartsWith($haystack, $needle)
    {
        $this->assertTrue(elnur_string_starts_with($haystack, $needle));
    }

    /**
     * @dataProvider invalidStartsWithData
     *
     * @param string $haystack
     * @param string $needle
     */
    public function testInvalidStartsWith($haystack, $needle)
    {
        $this->assertFalse(elnur_string_starts_with($haystack, $needle));
    }

    /**
     * @dataProvider validEndsWithData
     *
     * @param string $haystack
     * @param string $needle
     */
    public function testValidEndsWith($haystack, $needle)
    {
        $this->assertTrue(elnur_string_ends_with($haystack, $needle));
    }

    /**
     * @dataProvider invalidEndsWithData
     *
     * @param string $haystack
     * @param string $needle
     */
    public function testInvalidEndsWith($haystack, $needle)
    {
        $this->assertFalse(elnur_string_ends_with($haystack, $needle));
    }

    /**
     * @return array
     */
    public function validStartsWithData()
    {
        return [
            ['foo', ''],
            ['foo', 'f'],
            ['foo', 'fo'],
            ['foo', 'foo'],
            ['проверка', 'про'],
            ['проверка', 'проверк'],
            ['проверка', 'проверка'],
        ];
    }

    /**
     * @return array
     */
    public function invalidStartsWithData()
    {
        return [
            ['foo', ' '],
            ['foo', 'z'],
            ['foo', 'o'],
            ['foo', 'oo'],
            ['foo', 'foobar'],
            ['проверка', 'ка'],
            ['проверка', 'ровер'],
            ['проверка', 'проверка1'],
        ];
    }

    /**
     * @return array
     */
    public function validEndsWithData()
    {
        return [
            ['foo', ''],
            ['foo', 'o'],
            ['foo', 'oo'],
            ['foo', 'foo'],
            ['проверка', ''],
            ['проверка', 'рка'],
            ['проверка', 'проверка'],
        ];
    }

    /**
     * @return array
     */
    public function invalidEndsWithData()
    {
        return [
            ['foo', ' '],
            ['foo', 'f'],
            ['foo', 'fo'],
            ['foo', 'z'],
            ['проверка', ' '],
            ['проверка', 'п'],
        ];
    }
}
