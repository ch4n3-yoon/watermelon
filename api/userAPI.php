<?php

require_once __DIR__ . '/../db.php';

function insertUser($id, $password, $nickname)
{
    global $conn;
    $query = "INSERT INTO `user` (`id`, `password`, `nickname`) VALUE (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $id, hash('sha512', $password), $nickname);
    $exec = mysqli_stmt_execute($stmt);
    if($exec === false) {
        echo('[*] Query Execution Failed : ' . mysqli_error($conn));
        exit();
    }
    return $exec;
}

function findUserByUser_no($user_no)
{
    global $conn;
    $query = "SELECT * FROM `user` WHERE `user_no` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $user_no);
    $exec = mysqli_stmt_execute($stmt);
    if($exec === false) {
        echo('[*] Query Execution Failed : ' . mysqli_error($conn));
        exit();
    }
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_array($result);
}

function findUserById($id)
{
    global $conn;
    $query = "SELECT * FROM `user` WHERE `id` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $id);
    $exec = mysqli_stmt_execute($stmt);
    if($exec === false) {
        echo('[*] Query Execution Failed : ' . mysqli_error($conn));
        exit();
    }
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_array($result);
}

function findUserByNickname($nickname)
{
    global $conn;
    $query = "SELECT * FROM `user` WHERE `nickname` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $nickname);
    $exec = mysqli_stmt_execute($stmt);
    if($exec === false) {
        echo('[*] Query Execution Failed : ' . mysqli_error($conn));
        exit();
    }
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_array($result);
}

function findUserByIdAndPassword($id, $password)
{
    global $conn;
    $query = "SELECT * FROM `user` WHERE `id` = ? AND `password` = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $id, $password);
    $exec = mysqli_stmt_execute($stmt);
    if($exec === false) {
        echo('[*] Query Execution Failed : ' . mysqli_error($conn));
        exit();
    }
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_array($result);
}


