<?php

require_once __DIR__ . '/api/userAPI.php';
require_once __DIR__ . '/api/musicAPI.php';
require_once __DIR__ . '/api/voteAPI.php';

$flag = "XMAS{******}";

if ($login) {
    $music = getMusicChartByUser_no((int)$user['user_no'], 0, 100);
    for ($i = 0; $i < count($music); $i++) {
        if ($music[$i]['vote'] > 1225) {
            die($flag);
        }
    }
}
