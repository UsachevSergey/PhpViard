<?php  
session_start(); 
//включаем вывод ошибок 
ini_set('display_errors',1);  
$uritest = $_SERVER['REQUEST_URI']; 
//подключаем основные файлы
    include_once 'App/first.php'; 
?>
