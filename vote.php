<?php

require_once __DIR__ . '/core.php';

if (!$login) {
    die("Please sign in.");
}

$user_no = $user['user_no'];
$music_no = (int)$_POST['music_no'];

if (findVoteByMusic_noAndUser_no($music_no, $user_no)) {
    die("You've already voted.");
}

insertVote($music_no, $user_no);
echo "It was reflected in the vote successfully.";
