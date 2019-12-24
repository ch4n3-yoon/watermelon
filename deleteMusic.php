<?php

require_once __DIR__ . '/api/userAPI.php';
require_once __DIR__ . '/api/musicAPI.php';
require_once __DIR__ . '/api/voteAPI.php';

function getAllMusicList()
{
    global $conn;
    $query = "SELECT *, (SELECT `nickname` FROM `user` WHERE `user`.`user_no` = `music`.`user_no`) AS `uploader`,
        (SELECT COUNT(*) FROM `vote` WHERE `vote`.`music_no` = `music`.`music_no`) AS vote FROM `music`";
    $result = mysqli_query($conn, $query);
    $music_list = [];
    while ($row = mysqli_fetch_array($result)) {
        array_push($music_list, Array('music_no' => $row['music_no'],
            'music_title' => $row['music_title'],
            'filename' => $row['filename'],
            'location' => $row['location'],
            'user_no' => $row['user_no'],
            'upload_time' => $row['upload_time'],
            'uploader' => $row['uploader'],
            'vote' => $row['vote'],
        ));
    }
    return $music_list;
}

if (time() % (60 * 10) === 0) {
    $music = getAllMusicList();
    for ($i = 0; $i < count($music); $i++) {
        $timestamp = strtotime($music[$i]['upload_time']);
        if ( (time() - 1) > $timestamp ) {
            $file = "/home/ch4n3/www{$music[$i]['location']}";
            $exist = file_exists($file);
            echo "{$file}/{$exist}\n";
            @unlink($file);
        }
    }
}
