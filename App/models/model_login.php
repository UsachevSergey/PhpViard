<?php

class model_login extends Model {

    public function set_data_session($L,$P,$vk=null) {

        //подключаем модель пользователей
        include_once 'Users.php';

        //пересенная отвечает за успешное выполнения операций 
        $execution_function = TRUE;
        $id_current_user;
        $login_current_user = $L;
        try {
            //создаем pdo объект подключения к бд
            $sbsase = DBconnect::return_db_connect();

            if ($vk==null){
            //шифруем пароль
            $currentpass = md5(sha1($P));
            }
            else{
            $currentpass = $P ;
            }
            //запрашиваем id пользователя которому принадлежит указаный логин и пароль
            //подготавливаем запрос
            $currenttemp = $sbsase->prepare("select id,Login,FirstName,LastName,Email from users where login='" . $login_current_user . "' &&  password = '" . $currentpass . "'");


            $currenttemp->execute();

            //возвращает в виде масива классов
            $results = $currenttemp->fetchAll(PDO::FETCH_CLASS, "Users");


            if (count($results) > 0) {

                $Current_user = new Users;
                $Current_user = $results[0];

                $id_current_user = $Current_user->id;
            }else{ 
                  $execution_function = FALSE;
            }
        } catch (Exception $e) {
            phpinfo();
            $execution_function = FALSE;
        }
          
        if ($execution_function) {
            //если всё успешно то устанавливаем данные ссессии текущему пользователю 
            $_SESSION['login'] = $login_current_user;
            $_SESSION['id'] = $id_current_user;
            $bsase = null;
            return true;
        } else {
            //уничтожаем сессию и возвращаем false 
            session_destroy();
            $bsase = null;
            return false;
        }
    }

}

?>
