<?php

require_once __DIR__ . '/../db.php';

function insertMusic($music_title, $filename, $location, $user_no)
{
    global $conn;
    $query = "INSERT INTO `music` (`music_title`, `filename`, `location`, `user_no`, `upload_time`) VALUE (?, ?, ?, ?, NOW())";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sssi', $music_title, $filename, $location, $user_no);
    $exec = mysqli_stmt_execute($stmt);
    if($exec === false) {
        echo('[*] Query Execution Failed : ' . mysqli_error($conn));
        exit();
    }
    return $exec;
}

function getMusicList($offset = 0, $limit = 100)
{
    global $conn;
    $query = sprintf("SELECT *, (SELECT `nickname` FROM `user` WHERE `user`.`user_no` = `music`.`user_no`) AS `uploader`,
        (SELECT COUNT(*) FROM `vote` WHERE `vote`.`music_no` = `music`.`music_no`) AS vote                
        FROM `music` ORDER BY `music_no` DESC LIMIT %d, %d", $offset, $limit);
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

function getMusicChart($offset = 0, $limit = 100)
{
    global $conn;
    $query = sprintf("SELECT *, (SELECT `nickname` FROM `user` WHERE `user`.`user_no` = `music`.`user_no`) AS `uploader`,
        (SELECT COUNT(*) FROM `vote` WHERE `vote`.`music_no` = `music`.`music_no`) AS vote                
        FROM `music` ORDER BY `vote` DESC, `music_no` ASC LIMIT %d, %d", $offset, $limit);
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

function getMusicChartByUser_no($user_no, $offset = 0, $limit = 100)
{
    global $conn;
    $query = sprintf("SELECT *, (SELECT `nickname` FROM `user` WHERE `user`.`user_no` = `music`.`user_no`) AS `uploader`,
        (SELECT COUNT(*) FROM `vote` WHERE `vote`.`music_no` = `music`.`music_no`) AS vote                
        FROM `music` WHERE `user_no` = %d ORDER BY `vote` DESC LIMIT %d, %d", (int)$user_no, $offset, $limit);
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

function getMusicCount()
{
    global $conn;
    $query = "SELECT COUNT(*) AS `count` FROM `music` WHERE 1";
    $result = mysqli_query($conn, $query);
    $fetch = mysqli_fetch_array($result);
    return (int)$fetch['count'];
}
