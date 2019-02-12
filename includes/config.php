<?php
// require the crypty class.
require_once('includes/crypty.class.php');

// website settings.
$website['name']       = 'EncryptionBox';
$website['year']       = date('Y');
$website['algorithms'] = crypty::all_algorithms();
$website['more']       = array_rand($website['algorithms'], 8);
$website['count']      = count($website['algorithms']);
$website['url']        = crypty::website_url();
$website['current']    = crypty::website_current();
?>