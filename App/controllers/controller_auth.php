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
        
       //изначально логин не подтвержден
        // устанавливаем логин
       $loginvirification = $model->set_data_session();; 
            
       //если сесия успешна установлена то 
        if ($loginvirification ) {
           
       //перенавравляем на главную страницу
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 200 OK'); 
	header('Location:'.$host.'main'); 
        exit();
            
          }else{
              //перенаправляем на 404
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
	header('Location:'.$host.'error404'); 
            exit();
          }
    }
    
    function Action_logout(){ 
        //удаляем все данные из сесии
        $_SESSION = array(); 
        //уничтожаем сессию
        session_destroy(); 
        //после разрыва сесии переходим на главную страницу
      
        //перенавравляем на главную страницу
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 200 OK'); 
	header('Location:'.$host.'main'); 
        exit();
        
    }
    
    }




?>

