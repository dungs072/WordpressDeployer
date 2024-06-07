<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

$filepath = realpath(dirname('wp-content/themes/blocksy/inc/classes/classes'));
require_once($filepath . "/blocksy-blocks-parser.php");
require_once($filepath . "/blocksy-walker-page.php");

final class ImportantClassExistTest extends TestCase
{

    public function test_parser_class_exists() {
        $this->assertTrue(class_exists('Blocksy_WP_Block_Parser'), "Class Blocksy_WP_Block_Parser does not exist");
    }

    public function test_walker_class_exists() {
        $this->assertTrue(class_exists('Blocksy_Walker_Page'), "Class Blocksy_Walker_Page does not exist");
    }
}
