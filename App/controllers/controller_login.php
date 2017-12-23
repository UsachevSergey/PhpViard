<?php

class controller_login extends Controller {

    
    //переход на страницу входа
    function action_index() {
        
        $this->view->generate(" login_view.php","template_view.php");
    }
    
    //вход
    function log(){
        
        
        $current_login_for_authorization    =
        $current_password_for_authorization = 
        
        
                
        //перейти на главную страницу
         $this->view->generate(" login_view.php","template_view.php");  
        
         //или перейти на предыдущую страницу если логин указан не верно
          $this->view->generate(" main_view.php","template_view.php");
    }
}


?>

