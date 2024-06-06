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
