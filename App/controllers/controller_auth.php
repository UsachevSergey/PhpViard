<?php

class controller_auth extends Controller {

    
    //переход на страницу входа
    function action_index() {
        
        $this->view->generate(" errrrror.php","template_view.php");
    }
    
    
    //вход
    function Action_login(){
        
        //создаем экземпляр модели
        $model = new model_login();
        
        $model->set_data_session();
        
       // $current_login_for_authorization    = $_SESSION[];
        //$current_password_for_authorization 
        
       //изначально логин не подтвержден
       $loginvirification = false; 
                
        //перейти на главную страницу
        // $this->view->generate(" login_view.php","template_view.php");  
        
         //или перейти на предыдущую страницу если логин указан не верно
        //  $this->view->generate(" main_view.php","template_view.php");
    }
}


?>

