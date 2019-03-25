<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
function registerUser($username){
    $servername = "localhost";
    $username = "azure";
    $password = "6#vWHD_$";
    $dbConnection = new PDO('mysql:dbname=localdb;host='.$servername.';charset=utf8', $username, $password);
    $dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $preparedStatement = $dbConnection->prepare('INSERT IGNORE INTO Player (username) VALUES (:username)');
    $preparedStatement->execute(array('username' => $username));
}
?>