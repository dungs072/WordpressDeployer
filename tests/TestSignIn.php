<?php

// Mock functions for testing
function mock_add_filter($tag, $function) {
  // Assert that the functions being added are the expected ones
  expect($tag)->toBe('wp_robots');
  expect($function)->toBe('wp_robots_sensitive_page');

  // Assert that the functions being added are the expected ones (for referrer)
  expect($tag)->toBe('login_head');
  expect($function)->toBe('wp_strict_cross_origin_referrer');
}

function mock_is_wp_error($error) {
  return true; // Simulate a WP_Error object
}

function mock_is_wp_error_without_error($error) {
  return false; // Simulate not a WP_Error object
}

function mock_apply_filters($tag, $value) {
  return array('empty_username'); // Simulate error codes for shaking
}

function mock_apply_filters_without_errors($tag, $value) {
  return array(); // Simulate no errors
}

// Test functions
function test_login_header_adds_filters() {
  $original_add_filter = wp_filter_add_action;
  wp_filter_add_action = mock_add_filter;

  login_header();

  wp_filter_add_action = $original_add_filter;
}

function test_login_header_handles_error_object() {
  $original_is_wp_error = is_wp_error;
  is_wp_error = mock_is_wp_error;

  $wp_error = new WP_Error();
  login_header($title="Test Title", $message="Test Message", $wp_error);

  is_wp_error = $original_is_wp_error;
}

function test_login_header_creates_error_object() {
  $original_is_wp_error = is_wp_error;
  is_wp_error = mock_is_wp_error_without_error;

  login_header($title="Test Title", $message="Test Message");

  is_wp_error = $original_is_wp_error;

  $global_wp_errors = isset($GLOBALS['wp_errors']) ? $GLOBALS['wp_errors'] : null;
  expect($global_wp_errors)->toBeInstanceOf('WP_Error');
}

function test_login_header_does_not_shake_form_without_errors() {
  $original_apply_filters = apply_filters;
  apply_filters = mock_apply_filters_without_errors;

  $wp_error = new WP_Error();
  login_header($title="Test Title", $message="Test Message", $wp_error);

  apply_filters = $original_apply_filters;

  $added_actions = did_action('login_footer');
  expect($added_actions)->toBe(0);
}

function test_login_header_shakes_form_with_errors() {
  $original_apply_filters = apply_filters;
  apply_filters = mock_apply_filters;

  $wp_error = new WP_Error();
  login_header($title="Test Title", $message="Test Message", $wp_error);

  apply_filters = $original_apply_filters;

  $added_actions = did_action('login_footer');
  expect($added_actions)->toBe(1);
}
