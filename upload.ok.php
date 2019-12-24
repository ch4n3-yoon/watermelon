<?php

require_once __DIR__ . '/core.php';

if (!$login) {
    die(alert("You must sign in to access the service.", '/xmas/?p=signin'));
}

$title = $_POST['title'];
if (strlen($title) < 1) {
    die(alert("The title of the music has not been entered.", 'back'));
}

// 파일이 첨부되었는지 확인
if (!isset($_FILES["file"])) {
    die(alert("File not attached.", 'back'));
}

$file = $_FILES["file"];
$filename = $file["name"];
$size = $file["size"];
$error = $file["error"];
$tmp_name = $file["tmp_name"];

$token = $_COOKIE['PHPSESSJWT'];
$user = $jwt->dehashing($token);

// 파일이 5mb 이상이면 업로드 불가
if (($size/1024/1024) > 5. || $error === 1) {
    die(alert("You cannot upload files larger than 5mb.", 'back'));
}

if ( $error > 0 )
    die("Error: {$error}");

if ($size === 0) {
    die(alert("The file was not uploaded normally.", 'back'));
}

// 파일 확장자 검사
$extension = strtolower(end(explode('.', $filename)));
if ($extension !== "mp3"  && $extension !== "wav") {
    die(alert("Forbidden extension", 'back'));
}

$location = "/xmas/upload/".getRandomFilename().".{$extension}";
$real_location = "/home/ch4n3/www" . $location;
move_uploaded_file($tmp_name, $real_location);
insertMusic($title, $filename, $location, $user['user_no']);

if (!file_exists($real_location))
    die(alert("The file was NOT uploaded successfully.", 'back'));
echo alert("File uploaded successfully.", 'back');
