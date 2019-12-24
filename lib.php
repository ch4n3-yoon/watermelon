<?php


function alert($msg, $location = '')
{
    $msg = addslashes($msg);
    $location = addslashes($location);
    $code = "<script>alert(\"{$msg}\");";
    if ($location === 'back')
        $code .= "history.back();";
    else if ($location !== '')
        $code .= "location.href=\"{$location}\";";
    $code .= "</script>";
    return $code;
}

function unxss($data)
{
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function sha512($data)
{
    return hash('sha512', $data);
}

function getRandomFilename()
{
    list($usec, $sec) = explode(' ', microtime());
    $random = $sec + $usec * 10000000;
    return substr(hash('sha512', $random), 0, 32);
}
