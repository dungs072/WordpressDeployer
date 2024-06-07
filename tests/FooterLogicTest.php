<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

$filepath = realpath(dirname('wp-content/themes/blocksy/inc/components/builder/builder'));
require_once($filepath . "/footer-logic.php");


final class FooterLogicTest extends TestCase
{

    private $myClass;

    public function setUp(): void
    {
        $this->myClass = new Blocksy_Footer_Builder(); 
    }


    public function testDefaultStructureForType1()
    {
        $expectedType1Structure = [
            'id' => 'type-1',
            'rows' => [
                'top-row' => [
                    'columns' => [],
                ],
                'middle-row' => [
                    'columns' => [],
                ],
                'bottom-row' => [
                    'columns' => ['copyright'],
                ],
            ],
        ];

        $default = $this->myClass->get_default_value();
        $this->assertEquals($expectedType1Structure, $default['sections'][0]);
    }

    public function testDefaultStructureForType2()
    {
        $expectedType2Structure = [
            'id' => 'type-2',
            'rows' => [
                'top-row' => [
                    'columns' => [],
                ],
                'middle-row' => [
                    'columns' => [],
                ],
                'bottom-row' => [
                    'columns' => ['copyright'],
                ],
            ],
        ];

        $default = $this->myClass->get_default_value();
        $this->assertEquals($expectedType2Structure, $default['sections'][1]);
    }
}
