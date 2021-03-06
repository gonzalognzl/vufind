<?php
/**
 * ResourceContainer Test Class
 *
 * PHP version 7
 *
 * Copyright (C) Villanova University 2010.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category VuFind
 * @package  Tests
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org/wiki/development:testing:unit_tests Wiki
 */
namespace VuFindTest;

use VuFindTheme\ResourceContainer;

/**
 * ResourceContainer Test Class
 *
 * @category VuFind
 * @package  Tests
 * @author   Demian Katz <demian.katz@villanova.edu>
 * @license  http://opensource.org/licenses/gpl-2.0.php GNU General Public License
 * @link     https://vufind.org/wiki/development:testing:unit_tests Wiki
 */
class ThemeResourceContainerTest extends Unit\TestCase
{
    /**
     * Test CSS add/remove.
     *
     * @return void
     */
    public function testCss()
    {
        $container = new ResourceContainer();
        $container->addCss(['a', 'b', 'c']);
        $container->addCss('c');
        $container->addCss('d');
        $container->addLessCss('e.less');
        $container->addCss('e');
        $this->assertEquals([], array_diff(['a', 'b', 'c', 'd'], $container->getCss()));
    }

    /**
     * Test LESS add/remove.
     *
     * @return void
     */
    public function testLess()
    {
        $container = new ResourceContainer();
        $container->addCss(['c', 'd.css']);
        $container->addLessCss(['active' => true, 'a', 'b', 'c']);
        $container->addLessCss('c');
        $container->addLessCss('d');
        $this->assertEquals([], array_diff(['a', 'b', 'c', 'd'], $container->getLessCss()));
        $this->assertEquals(['c'], $container->getCss());
    }

    /**
     * Test Javascript add/remove.
     *
     * @return void
     */
    public function testJs()
    {
        $container = new ResourceContainer();
        $container->addJs(['a', 'b', 'c']);
        $container->addJs('c');
        $container->addJs('d');
        $this->assertEquals([], array_diff(['a', 'b', 'c', 'd'], $container->getJs()));
    }

    /**
     * Test Encoding set/get.
     *
     * @return void
     */
    public function testEncoding()
    {
        $container = new ResourceContainer();
        $container->setEncoding('fake');
        $this->assertEquals('fake', $container->getEncoding());
    }

    /**
     * Test Favicon set/get.
     *
     * @return void
     */
    public function testFavicon()
    {
        $container = new ResourceContainer();
        $container->setFavicon('fake');
        $this->assertEquals('fake', $container->getFavicon());
    }

    /**
     * Test Generator set/get.
     *
     * @return void
     */
    public function testGenerator()
    {
        $container = new ResourceContainer();
        $container->setGenerator('fake');
        $this->assertEquals('fake', $container->getGenerator());
    }
}
