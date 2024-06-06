<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
$filepath = realpath (dirname('wp-content/themes/blocksy/inc'));
require_once($filepath."/classes/database.php");
final class ThemeModTest extends TestCase
{
    private $themeMods;

    public function setUp():void
    {
        $this->themeMods = array();
    }

    public function testThemeModExistsNotInAdminPreviewOrAJAX()
    {
        $this->themeMods['my_theme_mod'] = 'blue';

        $result = $this->getThemeMod('my_theme_mod');
        $this->assertEquals('blue', $result);
    }

    public function testThemeModDoesNotExistNotInAdminPreviewOrAJAX()
    {
        $result = $this->getThemeMod('my_theme_mod');
        $this->assertFalse($result);
    }

    public function testThemeModExistsInAdmin()
    {
        define('WP_ADMIN', true);

        $this->getThemeMod('my_theme_mod');
        $this->assertTrue(is_array($this->themeMods));

        define('WP_ADMIN', false);
    }

    public function testThemeModExistsInCustomizationPreview()
    {
        $GLOBALS['wp_customize'] = new WP_Customize();

        $this->getThemeMod('my_theme_mod');
        $this->assertTrue(is_array($this->themeMods));

        unset($GLOBALS['wp_customize']);
    }

    public function testThemeModExistsInAJAX()
    {
        $_REQUEST['action'] = 'my_ajax_action';

        $this->getThemeMod('my_theme_mod');
        $this->assertTrue(is_array($this->themeMods));

        unset($_REQUEST['action']);
    }

    public function testFilterApplied()
    {
        add_filter('theme_mod_my_theme_mod', function ($value) {
            return $value . '_filtered';
        });

        $this->themeMods['my_theme_mod'] = 'original';

        $result = $this->getThemeMod('my_theme_mod');
        $this->assertEquals('original_filtered', $result);

        remove_filter('theme_mod_my_theme_mod');
    }

    private function getThemeMod($name, $defaultValue = false)
    {
        $myDatabase = new Database();
        return $myDatabase->getThemeMod($name, $defaultValue);
    }
}

