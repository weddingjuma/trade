<?php

/**
*
*@author: Tiamiyu waliu kola
*@website : www.crea8social.com
*/
$key = "fdhskjfhsfkjhkjHKSJDHFKJSHFKSJDFHKSJHKJ21U1Y8973213987sagdasjgadshgah";
$filename = (isset($_GET['name'])) ? $_GET['name'] : null;
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$userKey = (isset($_GET['key'])) ? $_GET['key'] : null;



if ($key != $userKey or !$filename or !in_array($action, ['save', 'delete'])) die('error');

$pathInfo = pathinfo($filename);

$dirPath = $pathInfo['dirname'];
$file = $pathInfo['basename'];

if (!is_dir($dirPath)) {
    @mkdir($dirPath, 0777, true);
}

if ($action == 'save') {
    //$uploadfile = $uploaddir . basename($_FILES['file_contents']['name']);
    if (move_uploaded_file($_FILES['file_contents']['tmp_name'], $filename)) {
        //echo "File is valid, and was successfully uploaded.\n";
    }
} else {
    if (file_exists($filename)) {
        @unlink($filename);
    }
}