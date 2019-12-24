<?php

require_once __DIR__ . '/../db.php';

function insertVote($music_no, $user_no)
{
    global $conn;
    $query = "INSERT INTO `vote` (`music_no`, `user_no`, `vote_time`) VALUE (?, ?, NOW())";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $music_no, $user_no);
    $exec = mysqli_stmt_execute($stmt);
    if($exec === false) {
        echo('[*] Query Execution Failed : ' . mysqli_error($conn));
        exit();
    }
    return $exec;
}

function findVoteByMusic_noAndUser_no($music_no, $user_no)
{
    global $conn;
    $query = "SELECT * FROM `vote` WHERE `music_no` = ? AND `user_no` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $music_no, $user_no);
    $exec = mysqli_stmt_execute($stmt);
    if($exec === false) {
        echo('[*] Query Execution Failed : ' . mysqli_error($conn));
        exit();
    }
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_array($result);
}


/*
 * CREATE TABLE `xmas`.`music` ( `music_no` INT NOT NULL AUTO_INCREMENT , `music_title` VARCHAR(256) NOT NULL , `filename` VARCHAR(256) NOT NULL , `location` VARCHAR(256) NOT NULL , `user_no` INT NOT NULL , `upload_time` DATETIME NOT NULL , PRIMARY KEY (`music_no`), FOREIGN KEY (`user_no`) REFERENCES user(user_no)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_bin;

CREATE TABLE `xmas`.`vote` ( `vote_no` INT NOT NULL AUTO_INCREMENT , `music_no` INT NOT NULL , `user_no` INT NOT NULL , `vote_time` INT NOT NULL , PRIMARY KEY (`vote_no`), FOREIGN KEY (`user_no`) REFERENCES user(user_no), FOREIGN KEY (`music_no`) REFERENCES music(music_no)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_bin;
 */