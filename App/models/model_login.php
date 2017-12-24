<?php

    

class model_login extends Model {

    
     
    
    
    
    
    
      public function set_data_session() { 
         
          //подключаем модель пользователей
          include_once 'Users.php';
          
         //пересенная отвечает за успешное выполнения операций 
          $execution_function = TRUE;
          $id_current_user;
          $login_current_user = $_POST['login'];
          try{
          //создаем pdo объект подключения к бд
          $sbsase = new PDO('mysql:host=localhost;dbname=basephpviard', 'root', '12345');
          
          //шифруем пароль
          $currentpass = md5(sha1($_POST['password']));
          
          //запрашиваем id пользователя которому принадлежит указаный логин и пароль
          $currenttemp= $sbsase->prepare('select * from users where login=:log_exec   &  password = :pass_exec ');
        
            
             $currenttemp->execute([
             ':log_exec' => $login_current_user,
             ':log_exec' => $currentpass,
               
             ]); 
             
          $results = $currenttemp->fetchAll(PDO::FETCH_OBJ);
          if (count($results)>0) {
              $id_current_user = $results[0]['id'];
          }
          
          
          
          $fd2d2d =123;
          $fd2d2d++;
          
          } 
          catch (Exception $e)
          { 
              phpinfo();
               $execution_function = FALSE;
          }
          
          
          
          
        
          
          
          $bsase = null;
          
         if($execution_function){ 
          //если всё успешно то устанавливаем данные ссессии текущему пользователю 
         $_SESSION['login'] = $login_current_user;
         $_SESSION['id'] = $id_current_user;
         return true;
         
         }
         else{
             //уничтожаем сессию и возвращаем false 
             session_destroy(); 
             return false;           
          }
      } 
    
}

?>
