<?php

require_once __DIR__ . '/lib.php';

$_COOKIE['PHPSESSJWT'] = '';
setcookie('PHPSESSJWT', '', time() - 3600);
header("Location: /xmas/");
