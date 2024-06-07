<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

$filepath = realpath(dirname('wp-content/themes/blocksy/inc/classes/classes'));
require_once($filepath . "/hooks-manager.php");
require_once($filepath . "/database.php");
use Blocksy\Database;
use Blocksy\WpHooksManager;

final class ImportantClassExistTest extends TestCase
{
    public function test_database_class_exists() {
        $this->assertTrue(!class_exists('Database'), "Class Database does not exist");
    }

    public function test_WpHooksManager_class_exists() {
        $this->assertTrue(!class_exists('WpHooksManager'), "Class WpHooksManager does not exist");
    }
}
