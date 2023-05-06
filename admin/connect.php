<?php
$dsn = 'mysql:host=localhost;dbname=shop';
$user = 'root';
$pass = 'AEAexammaker882001';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $ex) {
    echo 'filed to connection' . $ex->getMessage();
}
