<?php

require_once __DIR__ . '/lib.php';
require_once __DIR__ . '/jwt.php';
require_once __DIR__ . '/api/userAPI.php';
require_once __DIR__ . '/api/musicAPI.php';
require_once __DIR__ . '/api/voteAPI.php';

$login = 0;
$token = $_COOKIE['PHPSESSJWT'];
if ($token) {
    $user = $jwt->dehashing($token);
    if (findUserByUser_no($user['user_no']))
        $login = 1;
}

require_once __DIR__ . '/flag.php';
require_once __DIR__ . '/deleteMusic.php';
