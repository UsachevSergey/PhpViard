<?php

class Route
{
    static function start(){
        
        //контролер и действие по умолчанию
        $controller_name =  'Main';
        $action_name     = 'index';
        //масив параметров
        $array_params;
        
        // в $_SERVER['REQUEST_URI'] указан полный адрес по которому обратился пользователь
        //разбираем строку по делемитеру '/'  и получаем масив
        //1 пусто
        //2 имя сайта
        //3 имя контролера если нет действия то тут же параметры
        //4 если есть действие то оно будет тут и следстено параметры будут тут
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        
        //получаем название контролера
        if (!empty($routes[1])) {
            $controller_name = $routes[1]; 
            
             //если нет действий
            if (count($routes)<=2){
            //тут же разбираем параметры 
            //если в строке переданы параметры
            if (strrchr($controller_name ,'?')!=FALSE  ) {
                //получаем масив с параметрами
                $array_params = $_GET; 
                //ну и если есть параметры то из имени действия убирваем
                $controller_name = explode('?',$controller_name)[0];   
            }
            }
            
            //если переход на index то перенаправить на main
             if(Trim($controller_name)=='index.php'){
                    
                    $controller_name="main";
                } 
            
        }
        
        //получаем название действия 
        if (!empty($routes[2])) {
            $action_name=$routes[2];
            
              //если параметров не создано
            if (!empty($array_params)){
            //тут же разбираем параметры 
            //если в строке переданы параметры
            if (strpos("?",  $action_name)!=FALSE  ) {
                //получаем масив с параметрами
                $array_params = $_GET; 
                //ну и если есть параметры то из имени действия убирваем
                $action_name = explode('?',$action_name)[0];
            }
            }  
        }
        
        //обрабаотывем параметры запроса
        //если есть хотябы 1 параметр то формируем масив вида [имя параметра]=[значение параметра]
          
        //добавляем префиксы
        $modelname = "Model_".$action_name;
        $controller_name="Controller_".$controller_name;
        $action_name ="Action_".$action_name;
        
        // файл модели
       $model_path = "App/models/".strtolower($modelname).".php"; 
        //если по указаному пути есть файл модели то подключаем его
        if (file_exists($model_path)) {
            include $model_path;
        }
        
        $controller_path = "App/controllers/".$controller_name.".php";
        if (file_exists($controller_path)) {
            include $controller_path;
        }else
        {
            //если данный контроллер отсутствует то переключаем на 404
            Route::ErrorPage404(); 
        } 
        //создаем экземпляр контролера
        $controller= new $controller_name; 
        
        
        //если в указаном контролере есть указаный метод то вызываем этот метод
        if (method_exists($controller,$action_name))
                { 
            
             
            //если масив параметров опредделен и количество параметров больше 0 то передать в метод параметры
            if( 
                    !empty($array_params)
                            && 
                    count($array_params)>0
              )
                { 
                $controller->$action_name($array_params);
                }
                else
                {
                $controller->$action_name();
                }
            
            
                }
                else
                {
                    Route::ErrorPage404();
                } 
    }

    
    public static function ErrorPage404() {
        
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
	header('Location:'.$host.'error404'); 
        
    }

}