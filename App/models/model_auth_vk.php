<?php

//клас для проверки аутентификации
class model_auth_vk extends Model {

    function verefication($uid) {
        //проверить откуда пришел запрос
        //запрос может приходить только с самого себя

        
        
        //проверить есть ли такой пользователь в базе  
        //устанавливаем подключение
        $sbsase = DBconnect::return_db_connect();
        //запрашиваем id пользователя которому принадлежит указаный логин и пароль
        //подготавливаем запрос
        $currenttemp = $sbsase->prepare("select id,Login,FirstName,LastName,Email,vkid from users where vkid ='" . $uid . "'");
        $currenttemp->execute();
        //возвращает в виде масива классов
        $results = $currenttemp->fetchAll(PDO::FETCH_CLASS, "Users");

        if (count($results) > 0) {
            //такой пользователь есть и перейти к его авторизации
        } else {
            //такого пользователя нет и перейти к его регистрации 
        }
    }

}

?>
