<?php

require_once __DIR__ . '/core.php';
require_once __DIR__ . '/recaptcha.php';

$id = $_POST['id'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];


// 사용자 중복 검사
if (strlen($id) < 5 || strlen($id) > 32) {
    die(alert("You can enter 5 to 32 characters for your ID.", 'back'));
}

if (findUserById($id)) {
    die(alert("Your ID is already registered.", 'back'));
}

if (preg_match("/[^A-Za-z0-9]/", $id)) {
    die(alert("ID is only available in English and numeric characters.", 'back'));
}

if (strlen($nickname) < 1) {
    die(alert("Please enter your nickname.", 'back'));
}

if (findUserByNickname($nickname)) {
    die(alert("Your nickname is already registered.", 'back'));
}

if (preg_match("/[!@#$%^&*(),.?\":{}|<>]/", $nickname)) {
    die(alert("Special characters cannot be used for nicknames.", 'back'));
}

if (!insertUser($id, $password, $nickname)) {
    die(alert("Sign up failed.", 'back'));
}

echo alert("Registration success", 'back');

