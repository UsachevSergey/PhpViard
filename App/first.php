<?php 
//подключаем
//модели
include_once 'App/core/model.php';
//представления
include_once 'App/core/view.php';
//контролеры
include_once 'App/core/controller.php';
//подключение к базе
include_once 'App/core/DBconnect.php'; 
//маршрутизации
include_once 'App/core/route.php';



//запускаем маршрутизатор
Route::start(); 
?>