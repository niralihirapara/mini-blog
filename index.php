<?php

session_start();

include ("./database/connection.php");

if (isset($_GET['path'])) {
    $path = $_GET['path'];
    $path = preg_replace('/[^a-zA-Z0-9_-]/', '', $path);
} else {
    $path = 'home';
}

$securePaths = [
    'post',
    'category',
    'users',
    'contacts'
];


if (
    in_array($path, $securePaths) &&
    !(isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] === true)
) {
    header('Location: home');
    die();
}





$file = __DIR__ . '/pages/' . $path . '.php';

if (!file_exists($file)) {
    throw new Exception("Page not found");
}

include "includes/html.php";


