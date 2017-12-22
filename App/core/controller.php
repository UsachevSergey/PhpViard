<?php

Class Controller{
    
    public $model;
    public $view;
    
    function __construct() {
        $this->view = new View();
    }
    
    //действие по умолчанию.будет перекрыт в потомках
    function action_index(){
        
    }
    
    
}




?>