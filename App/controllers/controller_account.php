<?php

/*
контролер вызова страницы данных о пользователе
 */
class controller_account extends Controller { 
    
    
            
    function action_index(){
        
        //подключаем файл users
        $model_path = "App/models/Users.php"; 
        include_once $model_path;
        
          
        $Current_User =  new Users($_SESSION['id']); 
        
        
        $Current_User->GetDate();
        
        //запрашиваем данные и передаем их в представление 
        
          $this->view->generate("account_view.php", "template_view.php", $Current_User );
    }
}
