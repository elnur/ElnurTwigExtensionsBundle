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
namespace Elnur\Bundle\TwigExtensionsBundle\Twig\Extension {

    use Twig_Extension;
    use Twig_ExpressionParser;

    class StringExtension extends Twig_Extension
    {
        /**
         * @return array
         */
        public function getOperators()
        {
            return array(
                array(
                ),
                array(
                    'starts_with' => array(
                        'precedence' => 100,
                        'class' => 'Elnur\Bundle\TwigExtensionsBundle\Node\Expression\StartsWith',
                        'associativity' => Twig_ExpressionParser::OPERATOR_LEFT,
                    ),
                    'ends_with' => array(
                        'precedence' => 100,
                        'class' => 'Elnur\Bundle\TwigExtensionsBundle\Node\Expression\EndsWith',
                        'associativity' => Twig_ExpressionParser::OPERATOR_LEFT,
                    ),
                ),
            );
        }

        /**
         * @return string
         */
        public function getName()
        {
            return 'elnur.string';
        }
    }
}

namespace {
    /**
     * @param string $haystack
     * @param string $needle
     * @return boolean
     */
    function elnur_string_starts_with($haystack, $needle)
    {
        return !strncmp($haystack, $needle, strlen($needle));
    }

    /**
     * @param string $haystack
     * @param string $needle
     * @return boolean
     */
    function elnur_string_ends_with($haystack, $needle)
    {
        $length = strlen($needle);

        if (0 === $length) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
}
