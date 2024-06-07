<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

$filepath = realpath(dirname('wp-content/themes/blocksy/inc/components/woocommerce/common/common'));
require_once($filepath . "/checkout.php");

use Blocksy\WooCommerceCheckout;

final class CustomCheckOutTest extends TestCase
{

    public function testHasCustomCheckout()
    {
        // Mock the global $post variable
        $GLOBALS['post'] = null;

        // Scenario 1: No custom checkout plugins or Cartflows step
        $expectedResult = true;
        $actualResult = $this->has_custom_checkout();
        assertEquals($expectedResult, $actualResult, "Should return true without custom checkout plugins or Cartflows step");

        // Scenario 2: FluidCheckout exists
        class_exists('FluidCheckout', true); // Mock the existence of FluidCheckout class
        $expectedResult = false;
        $actualResult = $this->has_custom_checkout();
        assertEquals($expectedResult, $actualResult, "Should return false with FluidCheckout class");

        // Reset the mock
        class_exists('FluidCheckout', false);

        // Scenario 3: WFFN_Core exists
        class_exists('WFFN_Core', true); // Mock the existence of WFFN_Core class
        $expectedResult = false;
        $actualResult = $this->has_custom_checkout();
        assertEquals($expectedResult, $actualResult, "Should return false with WFFN_Core class");

        // Reset the mock
        class_exists('WFFN_Core', false);

        // Scenario 4: Cartflows step
        $GLOBALS['post'] = new stdClass(); // Mock the $post object
        $GLOBALS['post']->post_type = 'cartflows_step';
        $expectedResult = false;
        $actualResult = $this->has_custom_checkout();
        assertEquals($expectedResult, $actualResult, "Should return false with Cartflows step");

        // Reset the mock
        $GLOBALS['post'] = null;

        // Scenario 5: Filter override
        add_filter('blocksy:woocommerce:checkout:has-custom-markup', function ($has_custom_checkout) {
            return false;
        });
        $expectedResult = false;
        $actualResult = $this->has_custom_checkout();
        assertEquals($expectedResult, $actualResult, "Should respect filter override");

        // Remove the filter
        remove_filter('blocksy:woocommerce:checkout:has-custom-markup');
    }

    private function has_custom_checkout()
    {
        $checkout = new WooCommerceCheckout();
        return $checkout->has_custom_checkout();
    }
}
