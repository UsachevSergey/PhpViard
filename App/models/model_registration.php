<?php

 
class model_registration extends Model {
   
     public function try_register_new_user() {

        
        //пересенная отвечает за успешное выполнения операций 
        $execution_function = TRUE;
        
         
        $login_current_user = $_POST['login'];
        $password_current_user = md5(sha1($_POST['password']));
        $email_current_user = $_POST['email'];
        $phone_current_user = $_POST['phone'];
        
        
        
        try {
            //создаем pdo объект подключения к бд
            $sbsase = new PDO('mysql:host=localhost;dbname=basephpviard', 'xoiox', 'xoiox');
              
            //подготавливаем запрос
            $currenttemp = $sbsase->prepare("INSERT INTO `basephpviard`.`users` (Login, Password, Phone,Email) VALUES"
                    . " ('".$login_current_user."',"
                    . " '".$password_current_user."', "
                    . "'".$phone_current_user."' , "
                    . " '".$email_current_user."');" );

            //выполняем запрос
         $execution_function =  $currenttemp->execute();

            
        } catch (Exception $e) {
            phpinfo();
            $execution_function = FALSE;
        }
          
        if ($execution_function) {
            $bsase = null;
            return true;
        } else {
            $bsase = null;
            return false;
        }
    }

    
    
    
    
    
}

?>