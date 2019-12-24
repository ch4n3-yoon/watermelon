<?php

$captcha = $_POST['g-recaptcha-response'];
$secretKey = "";
$ip = $_SERVER['REMOTE_ADDR'];
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}&remoteip={$ip}");
$responseKeys = json_decode($response,true);
if(!$responseKeys["success"]) {
    die(alert("Are you a robot? The robot was destroyed by Lee Se-dol.", 'back'));
}