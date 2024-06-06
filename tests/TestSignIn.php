<?php

class TestSignIn extends \PHPUnit\FrameWork\TestCase{

  function test_login_header_shakes_form_with_errors() {
    $original_apply_filters = apply_filters;
    apply_filters = mock_apply_filters;
  
    $wp_error = new WP_Error();
    login_header($title="Test Title", $message="Test Message", $wp_error);
  
    apply_filters = $original_apply_filters;
  
    $added_actions = did_action('login_footer');
    expect($added_actions)->toBe(1);
  }
}

