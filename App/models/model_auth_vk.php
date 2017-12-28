<?php

//клас для проверки аутентификации
class Model_auth_vk extends Model {

    function reg($uid) {
        //проверить откуда пришел запрос
        //запрос может приходить только с самого себя 
        //проверить есть ли такой пользователь в базе  
        //устанавливаем подключение
        $sbsase = DBconnect::return_db_connect();
        //запрашиваем id пользователя которому принадлежит указаный логин и пароль
        //подготавливаем запрос
        $currenttemp = $sbsase->prepare("select id,Login,FirstName,LastName,Email,vkid,Password from users where vkid ='" . $uid . "'");
        $currenttemp->execute();
        //возвращает в виде масива классов
        $results = $currenttemp->fetchAll(PDO::FETCH_CLASS, "Users");

        if (count($results) > 0) {
          
        //создаем экземпляр модели
        $model_aut = new model_login();
 
        // устанавливаем логин
        $loginvirification = $model_aut->set_data_session("uid_".$uid,$results[0]->Password,"vk");

        //если сесия успешна установлена то 
        if ($loginvirification) {

            //перенавравляем на главную страницу
            $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('HTTP/1.1 200 OK');
            header('Location:' . $host . 'main');
            exit();
        } else {
            //перенаправляем на 404
            $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:' . $host . 'error404');
            exit();
        }
             
        } else {
           //РЕГИСТРИРУЕМ
           //создаем экземпляр класа регистрации
            $model_reg = new model_registration();
            
             
            $l= "uid_".$uid; 
            $e= "uid_".$uid."@thisuser.russian";
            $p= "911"; 
            $ps=md5(sha1(rand(1000000000,2000000000))); 
            //получаем ответ от метода вставки нового пользователя
            $suces = $model_reg->try_register_new_user($l,$e,$p,$ps,$uid);
            return suces;
        }
    }

}

?>
