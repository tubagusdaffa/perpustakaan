<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_admin() {
  $CI =& get_instance();
  return $CI->session->userdata('role') === 'Admin';
}

function is_logged_in() {
  $CI =& get_instance();
  return $CI->session->userdata('logged_in');
}
