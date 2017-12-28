<?php

class model_registration extends Model {

    
    
    
    public function try_register_new_user($trnu_login,$trnu_email,$trnu_phone,$trnu_password,$vkid=null) {

         
        //пересенная отвечает за успешное выполнения операций 
        $execution_function = TRUE;


        //убираем пробелы и переводим в малый регистр
        $login_current_user =  $trnu_login;//  trim(strtolower( $_POST['login'])); 
        $email_current_user = $trnu_email ;//   trim(strtolower(  $_POST['email']));
        $phone_current_user =$trnu_phone  ;//    trim(strtolower(  $_POST['phone'])); 
        $password_current_user =$trnu_password;// trim( $_POST['password']);

        try{
        //проверяем на валидность данных
        $execution_function = model_registration::valid(
                $login_current_user,
                $password_current_user,
                $email_current_user,
                $phone_current_user);
        
        
        } catch (Exception $e){
            
            echo $e;
        }
        
        //если данные валидны
        if ($execution_function) {

            if ($phone_current_user!=911) {
                 $password_current_user = md5(sha1($_POST['password']));
            }
           


            try {
                //создаем pdo объект подключения к бд
                $sbsase = DBconnect::return_db_connect();
                
                //подготавливаем запрос
                $currenttemp = $sbsase->prepare("INSERT INTO `basephpviard`.`users` (Login, Password, Phone,Email,vkid) VALUES"
                        . " ('" . $login_current_user . "',"
                        . " '" . $password_current_user . "', "
                        . "'" . $phone_current_user . "' , "
                        . " '" . $email_current_user . "' ,"
                        . " '" . $vkid . "'"
                        .");");

                //выполняем запрос
                $execution_function = $currenttemp->execute();
                
                
                
            } catch (Exception $e) { 
                
                $execution_function = FALSE;
            }

            if ($execution_function) {
                $bsase = null;
                return true;
            } else {
                $bsase = null;
                return false;
            }
        }else{ 
            return false; 
        };
    }

        //метод валидации данных
        function valid($c_login, $c_password, $c_email, $c_phone) {
        //подключаем модель пользователя
        include_once 'Users.php'; 
        //Проверяем на наличие такиого персонажа в базе
        try {
            //создаем pdo объект подключения к бд
            $sbsase = new PDO('mysql:host=localhost;dbname=basephpviard', 'xoiox', 'xoiox');
            //подготавливаем запрос
            $currenttemp = $sbsase->prepare("select id,Login,FirstName,LastName,Email from users where login='" . $c_login . "' ||  email = '" . $c_email . "'");
            $currenttemp->execute();
            //возвращает в виде масива классов
            $results = $currenttemp->fetchAll(PDO::FETCH_CLASS, "Users");
            //если есть хоть 1 пользователь с такими даными то запретить регистрацию
            if (count($results) > 0) {
              $_SESSION['error_messages'] =1; 
                return false;
            }
        } catch (Exception $e) {
            //возвращаем false в случае ошибки
            return false;
        } 
        //проверяем на валидность данных 
        //валиден ли email
       if (! preg_match("/[a-z]{1,}[a-z0-9_.]{1,}[@]{1,1}[a-z]{1,}[a-z0-9_.]{1,}[.][a-z]{1,}[a-z0-9_.]{1,}/i", $c_email)){
        $_SESSION['error_messages'] =2; 
           return false; 
       } 
          //валиден ли логин
       if (!preg_match("/[a-z]{1,}[a-z0-9_.]{1,}/i", $c_login)  ){
        $_SESSION['error_messages'] = 3;
           return false; 
       } 
        //валиден ли логин
       if (strlen($c_login)<5){
         $_SESSION['error_messages'] = 4;
           return false;
           } 
           //валиден ли телефон
       if(!preg_match("/[0-9]{10,11}/i", $c_phone) && $c_phone!=911 ){
           
           
           
           $_SESSION['error_messages'] =5;  
           return false;
       }     
        return true;
    }

}

?>