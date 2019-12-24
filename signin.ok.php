<?php

require_once __DIR__ . '/core.php';

$id = $_POST['id'];
$password = sha512($_POST['password']);

$result = findUserByIdAndPassword($id, $password);
if (!$result) {
    die(alert("Your ID entered does not exist or the password is incorrect.", 'back'));
}

$token = $jwt->hashing(array(
    'user_no' => $result['user_no'],
    'id' => $result['id'],
    'nickname' => $result['nickname'],
    'iat' => time(),
));

setcookie('PHPSESSJWT', $token, time() + 86400 * 30);
echo alert("You are signed in", '?p=main');
